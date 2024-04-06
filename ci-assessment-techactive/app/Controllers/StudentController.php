<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\StudentModel;
use App\Models\DuplicateCountModel;

class StudentController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function importCsvToDb()
    {
        $input = $this->validate([
            'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,csv],'
        ]);

        if (!$input) {
            $data['validation'] = $this->validator;
            return view('index', $data); 
        } else {
            if ($file = $this->request->getFile('file')) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('../public/csvfile', $newName);
                    $file = fopen("../public/csvfile/".$newName,"r");
                    $i = 0;
                    $numberOfFields = 4;
                    $csvArr = array();

                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);
                        if ($i > 0 && $num == $numberOfFields) { 
                            $csvArr[$i]['id'] = $filedata[0];
                            $csvArr[$i]['email'] = $filedata[1];
                            $csvArr[$i]['name'] = $filedata[2];
                            $csvArr[$i]['age'] = $filedata[3];
                        }
                        $i++;
                    }
                    fclose($file);
                    $count = 0;
                    foreach ($csvArr as $userdata) {
                        $students = new StudentModel();
                        $findRecord = $students->where('email', $userdata['email'])->countAllResults();
                        if ($findRecord == 0) {
                            if ($students->insert($userdata)) {
                                $count++;
                            }
                        } else {
                            // Email is duplicate, update count in duplicate_counts table
                            $duplicateCountModel = new DuplicateCountModel();
                            $existingCount = $duplicateCountModel->where('email', $userdata['email'])->first();
                            if ($existingCount) {
                                $duplicateCountModel->update($existingCount['id'], ['count' => $existingCount['count'] + 1]);
                            } else {
                                $duplicateCountModel->insert(['email' => $userdata['email'], 'count' => 1]);
                            }
                        }
                    }
                    session()->setFlashdata('message', $count.' rows successfully added.');
                    session()->setFlashdata('alert-class', 'alert-success');
                } else {
                    session()->setFlashdata('message', 'CSV file could not be imported.');
                    session()->setFlashdata('alert-class', 'alert-danger');
                }
            } else {
                session()->setFlashdata('message', 'CSV file could not be imported.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
        }
        return redirect()->route('/');         
    }
}