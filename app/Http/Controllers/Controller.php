<?php namespace App\Http\Controllers;

    use Illuminate\Foundation\Bus\DispatchesCommands;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Foundation\Validation\ValidatesRequests;

    abstract class Controller extends BaseController {

        use DispatchesCommands, ValidatesRequests;
        
        protected $paginate = 10;

        public function setBreadcrumbs($datas){
            $breadcrumbs = new \Creitive\Breadcrumbs\Breadcrumbs;
            $breadcrumbs->setDivider('');
            $breadcrumbs->setListElement('ol');
            $breadcrumbs->setCssClasses('breadcrumb');
            foreach($datas as $data){
                $breadcrumbs->addCrumb($data['name'], $data['url']);
            }
            if(count($datas)){
                \Session::put('breadcrumbs', $breadcrumbs);
            }
        }

    }
