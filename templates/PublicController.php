<?php


namespace Plugin\#NAME#;


class PublicController extends \Ip\Controller
{
    /**
     * Go to /day to see the result
     * @return \Ip\View
     */
    public function index()
    {
        $data['#NAME#'] = ipdb()->selectAll('#NAME#','*');
        return ipView('view/index.php', $data);
    }

   public function view($id)
    {
        $data['#NAME#'] = ipdb()->selectRow('#NAME#','*',array('id'=>$id));
        return ipView('view/single.php', $data);
    }



}
