<?php namespace App\Http\Controllers;

    use App\Http\Requests;
    use App\Http\Requests\ConfigRequest;
    use App\Http\Controllers\Controller;
    use App\Config;

    use Illuminate\Http\Request;

    class ConfigsController extends Controller {

        /**
        * Display a listing of the resource.
        *
        * @return Response
        */
        public function index()
        {
            $this->setBreadcrumbs([
                [
                    'name' => \Lang::get('lang.menu.home'),
                    'url' =>url('/')
                ],
                [
                    'name' => \Lang::get('lang.menu.configs'),
                    'url' =>url('configs')
                ],
            ]);
            $configs = Config::all();

            return view('configs.index', compact('configs'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return Response
        */
        public function create()
        {
            $this->setBreadcrumbs([
                [
                    'name' => \Lang::get('lang.menu.home'),
                    'url' =>url('/')
                ],
                [
                    'name' => \Lang::get('lang.menu.configs'),
                    'url' =>url('configs')
                ],
                [
                    'name' => \Lang::get('lang.menu.configs.create'),
                    'url' =>url('configs/create')
                ],
            ]);
            return view('configs.create');
        }

        /**
        * Store a newly created resource in storage.
        *
        * @return Response
        */
        public function store(ConfigRequest $request)
        {
            Config::create($request->all());

            return redirect('configs')->with('flash_message', 'Config has been created!');
        }

        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
        public function show($id)
        {
            $config = Config::findOrFail($id);

            return view('configs.show', compact('config'));
        }

        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
        public function edit($id)
        {
            $config = Config::findOrFail($id);

            return view('configs.edit', compact('config'));
        }

        /**
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        */
        public function update($id, ConfigRequest $request)
        {
            $config = Config::findOrFail($id);

            $config->update($request->all());

            return redirect('configs')->with('flash_message', 'Config has been updated!');
        }

        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return Response
        */
        public function destroy($id)
        {
            $config = Config::findOrFail($id);

            $config->delete();

            return redirect('configs')->with('flash_message', 'Config has been deleted!');
        }

    }
