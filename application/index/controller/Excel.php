<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use vendor\phpoffice\Classes;

class Excel extends Controller
{


   public  function excel()
    {
         $path = dirname(__FILE__); //找到当前脚本所在路径
         Loader::import('PHPExcel.Classes.PHPExcel');
         Loader::import('PHPExcel.Classes.PHPExcel.IOFactory.PHPExcel_IOFactory');
         $PHPExcel = new \PHPExcel();

        $PHPSheet = $PHPExcel->getActiveSheet();
        $PHPSheet->setTitle("demo"); //给当前活动sheet设置名称
        $PHPSheet->setCellValue("A1","姓名")->setCellValue("B1","分数");//表格数据
        $PHPSheet->setCellValue("A2","张三")->setCellValue("B2","2121");//表格数据
         $PHPWriter = \PHPExcel_IOFactory::createWriter($PHPExcel,"Excel2007");
         header('Content-Disposition: attachment;filename="表单数据.xlsx"');
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output");
     }

    /**
     * 导入页面
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch();

    }


    public function intoExcel()
    {
           /* Loader::import('PHPExcel.Classes.PHPExcel');
            Loader::import('PHPExcel.Classes.PHPExcel.IOFactory.PHPExcel_IOFactory');
            Loader::import('PHPExcel.Classes.PHPExcel.Reader.Excel5');*/

         /*   import('PHPExcel.Classes.PHPExcel');
            import('PHPExcel.Classes.PHPExcel.IOFactory.PHPExcel_IOFactory');
            import('PHPExcel.Classes.PHPExcel.Reader.Excel5');*/

            //获取表单上传文件
            $file = request()->file('excel');
            $info = $file->validate(['ext' => 'xlsx'])->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($info) {

                $exclePath = $info->getSaveName();  //获取文件名
                $file_name = ROOT_PATH . 'public' . DS . 'uploads' . DS . $exclePath;   //上传文件的地址
                $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
                $obj_PHPExcel = $objReader->load($file_name, $encode = 'utf-8');  //加载文件内容,编码utf-8
                echo "<pre>";
                $excel_array = $obj_PHPExcel->getsheet(0)->toArray();   //转换为数组格式
                var_dump($excel_array);
            } else {
                echo $file->getError();
            }
    }


    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
