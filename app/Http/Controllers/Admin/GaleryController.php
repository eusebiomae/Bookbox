<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\BaseMethodController;

use App\Model\api\Configuration\ContentPageModel;
use App\Model\api\Configuration\ContentSectionModel;

use App\Model\api\GaleryModel;
use App\Model\api\PhotoGaleryModel;
use File;

class GaleryController extends BaseMethodController {

  function __construct() {
    $this->pageKey = 'galery';

    $this->config = (object) [
      'pathView' => 'admin/galery',
      'urlAction' => 'admin/galery',
      'toView' => [
        'header' => 'layouts.header',
        'group_page' => 'Dados Galeria',
        'url_group' => '#',
        'module_page' => 'Galeria',
        'url_page' => 'admin/galery',
      ],
    ];
  }

  public function list(Request $request) {
    $dataTable = new \stdClass();
    $dataTable->data = GaleryModel::withTrashed()
    ->with('contentPage', 'photoGalery')->get();

    $dataTable->header = [
      (object) [
        'label' => 'ID',
        'column' => 'id',
      ],
      (object) [
        'label' => 'Título',
        'column' => 'title_pt',
      ],
      (object) [
        'label' => 'Página',
        'column' => 'contentPage.description_pt',
      ],
    ];

    $this->config->toView['dataTable'] = $dataTable;

    return parent::list($request);
  }

  public function insert(Request $request) {
    $this->config->toView['title_page'] = 'Inserir';
    // $this->config->toView['fileView'] = 'form';

    return parent::insert($request);
  }

  public function update(Request $request) {
    $this->apiModel = new GaleryModel();
    $this->config->toView['title_page'] = 'Atualizar';
    // $this->config->toView['fileView'] = 'form';

    $id = $request->id;

    return parent::update($request)->with('imgs', PhotoGaleryModel::where('galery_id', '=', $id)->get());
  }

  public function save(Request $request) {
    $this->apiModel = new GaleryModel();

    $request->paramsConfig = [
      'redirectBack' => false,
    ];

    $save = parent::save($request);

    if (!empty($request->file('fileImage'))) {
			$fileName = formatNameFile($request->file('fileImage')->getClientOriginalName());

			$request->file('fileImage')->move('storage/galery/' . $save->data->id, $fileName);
      GaleryModel::where('id', $save->data->id)->update([ 'image' => $fileName ]);
    }

    return redirect("/{$this->config->urlAction}/update/{$save->data->id}");
  }

  public function saveImgs(Request $request) {
    $request->paramsConfig = [
      'redirectBack' => false,
    ];

    $pathFile = 'storage/galery/' . $request['galery_id'];

    if (!empty($request->file('images'))) {
      $images = $request->file('images');

      $save = [];

      for($i = 0; $i < count($images); $i++){
        $fileName = formatNameFile(empty($request['title_pt']) ? $images[$i]->getClientOriginalName() : $request['title_pt'] . '_'. $i .'.'. $images[$i]->getClientOriginalExtension());

        $images[$i]->move($pathFile, $fileName);

        $photoGaleryModel = new PhotoGaleryModel();

        $photoGaleryModel->fill([
          'galery_id' => $request->get('galery_id'),
          'title_pt' => $request->get('title_pt') ? $request->get('title_pt') : '',
          'file' => $fileName,
        ])->save();

        $save[] = $photoGaleryModel;
      }

      return redirect()->back();
    }

    return [
      'error' => 'Não foi possivel realiar a operação',
    ];
  }

  public function delImg(Request $request) {
    if($request->get('whatIs') == 'galery_id'){
      $data = PhotoGaleryModel::where('galery_id', $request->get('id'));
    }else{
      $data = PhotoGaleryModel::find($request->get('id'));
    }

    if(!$data) {
      return response()->json([
        'message'   => 'Record not found',
      ], 404);
    }

    $data->delete();

    return null;
  }

}
