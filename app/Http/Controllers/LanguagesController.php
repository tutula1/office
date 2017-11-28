<?php namespace App\Http\Controllers;

    use App\Http\Requests;
    use App\Http\Requests\LanguageRequest;
    use App\Http\Controllers\Controller;
    use App\Language;

    use Illuminate\Http\Request;

    class LanguagesController extends Controller {

        /**
        * Display a listing of the resource.
        *
        * @return Response
        */
        public function index(Request $request)
        {
            $breadcrumbs = new \Creitive\Breadcrumbs\Breadcrumbs;
            $this->setBreadcrumbs([
                [
                    'name' => \Lang::get('lang.menu.home'),
                    'url' =>url('/')
                ],
                [
                    'name' => \Lang::get('lang.menu.languages'),
                    'url' =>url('languages')
                ],
            ]);
            $languages = Language::select("id", "name", "group", "vi", "en");
            $name = '';
            $vi = '';
            $en = '';
            if($request->name){
                $name = $request->name;
                $languages = $languages->where('name', 'like', '%'.$name.'%');
            }
            if($request->vi){
                $vi = $request->vi;
                $languages = $languages->where('vi', 'like', '%'.$vi.'%');
            }
            if($request->en){
                $en = $request->en;
                $languages = $languages->where('en', 'like', '%'.$en.'%');
            }
            $languages = $languages->paginate($this->paginate)->appends(['name' => $name, 'vi' => $vi, 'en' => $en]);
            return view('languages.index', compact('languages', 'name', 'vi', 'en'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return Response
        */
        public function create()
        {
            $breadcrumbs = new \Creitive\Breadcrumbs\Breadcrumbs;
            $this->setBreadcrumbs([
                [
                    'name' => \Lang::get('lang.menu.home'),
                    'url' =>url('/')
                ],
                [
                    'name' => \Lang::get('lang.menu.languages'),
                    'url' =>url('languages')
                ],
                [
                    'name' => \Lang::get('lang.menu.languages.create'),
                    'url' =>url('languages/create')
                ],
            ]);
            return view('languages.create');
        }

        /**
        * Store a newly created resource in storage.
        *
        * @return Response
        */
        public function store(Request $request)
        {
            Language::create($request->all());

            return redirect('languages')->with('flash_message', 'Language has been created!');
        }

        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
        public function show($id)
        {
            $language = Language::findOrFail($id);

            return view('languages.show', compact('language'));
        }

        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return Response
        */
        public function edit($id)
        {
            $language = Language::findOrFail($id);

            return view('languages.edit', compact('language'));
        }

        /**
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        */
        public function update($id, Request $request)
        {
            $language = Language::findOrFail($id);

            $language->update($request->all());

            return redirect('languages')->with('flash_message', 'Language has been updated!');
        }

        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return Response
        */
        public function destroy($id)
        {
            $language = Language::findOrFail($id);

            $language->delete();

            return redirect('languages')->with('flash_message', 'Language has been deleted!');
        }

    }
