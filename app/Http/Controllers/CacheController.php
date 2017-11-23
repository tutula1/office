<?php namespace App\Http\Controllers;

    use App\Http\Requests;
    use App\Http\Controllers\Controller;

    use Illuminate\Http\Request;

    class CacheController extends Controller {

        /**
        * Display a listing of the resource.
        *
        * @return Response
        */
        public function index()
        {
            $breadcrumbs = new \Creitive\Breadcrumbs\Breadcrumbs;
            $breadcrumbs->setDivider('');
            $breadcrumbs->setListElement('ol');
            $breadcrumbs->setCssClasses('breadcrumb');
            $breadcrumbs->addCrumb(\Lang::get('lang.menu.home'), url('/'));
            $breadcrumbs->addCrumb(\Lang::get('lang.menu.cache'), url('cache'));
            \Session::put('breadcrumbs', $breadcrumbs);
            $storage = \Cache::getStore(); // will return instance of FileStore
            $filesystem = $storage->getFilesystem(); // will return instance of Filesystem
            $dir = (\Cache::getDirectory());
            $keys = [];
            foreach ($filesystem->allFiles($dir) as $file1) {

                if (is_dir($file1->getPath())) {

                    foreach ($filesystem->allFiles($file1->getPath()) as $file2) {
                        $keys = array_merge($keys, [str_replace("\\", "+-+", $file2->getRealpath())]);
                    }
                }
                else {

                }
            }
            return view('cache.index', compact('keys'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return Response
        */
        public function create()
        {
            //
        }

        /**
        * Store a newly created resource in storage.
        *
        * @return Response
        */
        public function store()
        {
            //
        }

        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
        public function show($id)
        {
            //
        }

        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
        public function edit($id)
        {
            //
        }

        /**
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        */
        public function update($id)
        {
            //
        }

        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return Response
        */
        public function destroy($filename)
        {
            $filename = str_replace("+-+", "\\", $filename);
            if(is_file($filename)) {
                unlink($filename);
            }

            return redirect('cache')->with('flash_message', 'Cache has been deleted!');
        }

    }
