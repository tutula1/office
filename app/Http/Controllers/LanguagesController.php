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
        public function index()
        {
            $breadcrumbs = new \Creitive\Breadcrumbs\Breadcrumbs;
            $breadcrumbs->setDivider('');
            $breadcrumbs->setListElement('ol');
            $breadcrumbs->setCssClasses('breadcrumb');
            $breadcrumbs->addCrumb(\Lang::get('lang.menu.home'), url('/'));
            $breadcrumbs->addCrumb(\Lang::get('lang.menu.languages'), url('languages'));
            \Session::put('breadcrumbs', $breadcrumbs);
            $languages = Language::groupBy("group")->get();
            foreach ($languages as $language) {
                $language->language = Language::where("group", $language->group)->get();
            }

            return view('languages.index', compact('languages'));
        }

        /**
        * Show the form for creating a new resource.
        *
        * @return Response
        */
        public function create()
        {
            $breadcrumbs = new \Creitive\Breadcrumbs\Breadcrumbs;
            $breadcrumbs->setDivider('');
            $breadcrumbs->setListElement('ol');
            $breadcrumbs->setCssClasses('breadcrumb');
            $breadcrumbs->addCrumb(\Lang::get('lang.menu.home'), url('/'));
            $breadcrumbs->addCrumb(\Lang::get('lang.menu.languages'), url('languages'));
            $breadcrumbs->addCrumb(\Lang::get('lang.menu.languages.create'), url('languages/create'));
            \Session::put('breadcrumbs', $breadcrumbs);
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
