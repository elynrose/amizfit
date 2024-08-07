<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyConditionRequest;
use App\Http\Requests\StoreConditionRequest;
use App\Http\Requests\UpdateConditionRequest;
use App\Models\Condition;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConditionController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('condition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $conditions = Condition::all();

        return view('admin.conditions.index', compact('conditions'));
    }

    public function create()
    {
        abort_if(Gate::denies('condition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.conditions.create');
    }

    public function store(StoreConditionRequest $request)
    {
        $condition = Condition::create($request->all());

        return redirect()->route('admin.conditions.index');
    }

    public function edit(Condition $condition)
    {
        abort_if(Gate::denies('condition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.conditions.edit', compact('condition'));
    }

    public function update(UpdateConditionRequest $request, Condition $condition)
    {
        $condition->update($request->all());

        return redirect()->route('admin.conditions.index');
    }

    public function show(Condition $condition)
    {
        abort_if(Gate::denies('condition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.conditions.show', compact('condition'));
    }

    public function destroy(Condition $condition)
    {
        abort_if(Gate::denies('condition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $condition->delete();

        return back();
    }

    public function massDestroy(MassDestroyConditionRequest $request)
    {
        $conditions = Condition::find(request('ids'));

        foreach ($conditions as $condition) {
            $condition->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
