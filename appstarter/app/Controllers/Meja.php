<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;
use App\Models\Model_Meja;

class Meja extends Controller
{
    public function index()
    {
        $meja = new Model_Meja();
        $data = [
            'title' => 'Meja | WARJAM Admin Page',
            'meja' => $meja->orderBy('meja_id', 'ASC')->findAll(),
        ];
        echo view('admin/pages/meja/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Create Meja| WARJAM Admin Page',
        ];
        echo view('admin/pages/meja/create', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'nomor_meja' => [
                'rules' => 'required|is_unique[meja.nomor_meja]',
                'errors' => [
                    'required' => 'Nomor Meja Harus Diisi dengan Benar.',
                    'is_unique' => 'Nomor Meja Sudah Ada.',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to(base_url() . '/admin/meja/create')->withInput()->with('error', $validation->getErrors());
        } else {
            $meja = new Model_Meja();
            helper('text');
            $key = random_string('crypto', 16);

            $qrKey = base_url() . '/secret/' . $key;
            $imageName = $key . '.png';
            $path = 'image/meja/' . $imageName;
            $this->makeQR($qrKey, $path);
            $meja->save([
                'nomor_meja' => $this->request->getVar('nomor_meja'),
                'unique_key' => $key,
                'qr' => $imageName,
            ]);
        }

        return redirect()->to('/admin/meja');
    }

    public function edit($unique_key)
    {
        $meja = new Model_Meja();
        $table = $meja->where('unique_key', $unique_key)->first();
        $data = [
            'title' => 'Edit Meja| WARJAM Admin Page',
            'meja' => $table,
        ];
        echo view('admin/pages/meja/edit', $data);
    }

    public function update($id)
    {
        //validasi
        if (!$this->validate([
            'nomor_meja' => [
                'rules' => 'required|is_unique[meja.nomor_meja,meja_id,' . $id . ']',
                'errors' => [
                    'required' => 'Nomor Meja Harus Diisi dengan Benar.',
                    'is_unique' => 'Nomor Meja Sudah Ada.',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        } else {
            $meja = new Model_Meja();

            //unlink previous image
            $table = $meja->find($id);
            $unlink_path = 'image/meja/' . $table['qr'];
            unlink($unlink_path);

            helper('text');
            $key = random_string('crypto', 16);
            $qrKey = base_url() . '/secret/' . $key;
            $imageName = $key . '.png';
            $path = 'image/meja/' . $imageName;
            $this->makeQR($qrKey, $path);
            $meja->save([
                'meja_id' => $id,
                'nomor_meja' => $this->request->getVar('nomor_meja'),
                'unique_key' => $key,
                'qr' => $imageName,
            ]);
        }

        return redirect()->to('/admin/meja');
    }

    public function delete()
    {
        $meja = new Model_Meja();

        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $table = $meja->find($id);

            //get image file
            $path = 'image/meja/' . $table['qr'];
            if ($meja->delete($id)) {
                unlink($path);
                $msg = [
                    'sukses' => 'Data berhasil dihapus'
                ];
            }
            echo json_encode($msg);
        }
    }


    public function makeQR($key, $path)
    {
        $qrCode = new QrCode($key);
        $qrCode->setSize(300);
        $qrCode->setMargin(10);

        $qrCode->setWriterByName('png');
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
        $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
        $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
        $qrCode->setLabel('SCAN Aku', 16, 'fonts/noto_sans.otf', LabelAlignment::CENTER());
        $qrCode->setValidateResult(false);

        $qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_MARGIN);

        $qrCode->writeFile($path);
    }

    public function getQR()
    {
        if ($this->request->isAJAX()) {
            $meja = new Model_Meja();
            $id = $this->request->getVar('id');

            $table = $meja->find($id);
            return $this->response->setJSON($table);
        } else {
            return $this->response->setStatusCode(500, 'Error');
        }
    }
}
