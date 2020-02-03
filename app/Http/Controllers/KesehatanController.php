<?php

namespace App\Http\Controllers;

use App\DataTables\KesehatanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKesehatanRequest;
use App\Http\Requests\UpdateKesehatanRequest;
use App\Repositories\KesehatanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KesehatanController extends AppBaseController
{
    /** @var  KesehatanRepository */
    private $kesehatanRepository;

    public function __construct(KesehatanRepository $kesehatanRepo)
    {
        $this->kesehatanRepository = $kesehatanRepo;
    }

    /**
     * Display a listing of the Kesehatan.
     *
     * @param KesehatanDataTable $kesehatanDataTable
     * @return Response
     */
    public function index(KesehatanDataTable $kesehatanDataTable)
    {
        return $kesehatanDataTable->render('kesehatans.index');
    }

    /**
     * Show the form for creating a new Kesehatan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kesehatans.create');
    }

    /**
     * Store a newly created Kesehatan in storage.
     *
     * @param CreateKesehatanRequest $request
     *
     * @return Response
     */
    public function store(CreateKesehatanRequest $request)
    {
        $input = $request->all();

        $kesehatan = $this->kesehatanRepository->create($input);

        Flash::success('Kesehatan saved successfully.');

        return redirect(route('kesehatans.index'));
    }

    /**
     * Display the specified Kesehatan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kesehatan = $this->kesehatanRepository->find($id);

        if (empty($kesehatan)) {
            Flash::error('Kesehatan not found');

            return redirect(route('kesehatans.index'));
        }

        return view('kesehatans.show')->with('kesehatan', $kesehatan);
    }

    /**
     * Show the form for editing the specified Kesehatan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kesehatan = $this->kesehatanRepository->find($id);

        if (empty($kesehatan)) {
            Flash::error('Kesehatan not found');

            return redirect(route('kesehatans.index'));
        }

        return view('kesehatans.edit')->with('kesehatan', $kesehatan);
    }

    /**
     * Update the specified Kesehatan in storage.
     *
     * @param  int              $id
     * @param UpdateKesehatanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKesehatanRequest $request)
    {
        $kesehatan = $this->kesehatanRepository->find($id);

        if (empty($kesehatan)) {
            Flash::error('Kesehatan not found');

            return redirect(route('kesehatans.index'));
        }

        $kesehatan = $this->kesehatanRepository->update($request->all(), $id);

        Flash::success('Kesehatan updated successfully.');

        return redirect(route('kesehatans.index'));
    }

    /**
     * Remove the specified Kesehatan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kesehatan = $this->kesehatanRepository->find($id);

        if (empty($kesehatan)) {
            Flash::error('Kesehatan not found');

            return redirect(route('kesehatans.index'));
        }

        $this->kesehatanRepository->delete($id);

        Flash::success('Kesehatan deleted successfully.');

        return redirect(route('kesehatans.index'));
    }
}
