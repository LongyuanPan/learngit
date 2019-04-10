<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

/**工具类
 * Class ToolController
 * @package App\Http\Controllers
 */
class ToolController extends Controller
{
    /**excel表的导入
     * @param $cellData 数组数据 例如：
     * $cellData = [
     * ['学号','姓名','成绩'],
     * ['10001','AAAAA','99'],
     * ];
     * @param $tableName 表名
     */
    public function export($cellData, $tableName)
    {
      $name = iconv('UTF-8', 'GBK', $tableName);
      Excel::create($name, function ($excel) use ($cellData) {
            $excel->sheet('score', function ($sheet) use ($cellData) {
                $sheet->rows($cellData);
            });
        })->export('xls');
    }

    /**
     * excel表数据的显示
     */
    public function import()
    {
        $filePath = 'storage/exports/' . iconv('UTF-8', 'GBK', '学生成绩表') . '.xls';
        Excel::load($filePath, function ($reader) {
            $data = $reader->all();
            dump($data);
        });
    }


    public function test()
    {
        $cellData = [
            ['学号', '姓名', '成绩'],
            ['10001', 'AAAAA', '99'],
            ['10002', 'BBBBB', '92'],
            ['10003', 'CCCCC', '95'],
            ['10004', 'DDDDD', '89'],
            ['10005', 'EEEEE', '96'],
        ];
        $tableName = "学生成绩表";
        $this->export($cellData, $tableName);
    }
}
