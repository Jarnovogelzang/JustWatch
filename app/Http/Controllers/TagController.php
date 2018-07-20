<?php

namespace App\Http\Controllers;

class TagController extends Controller {
  /**
   * @param CreateTagRequest $objRequest
   */
  public function create(CreateTagRequest $objRequest) {
    return view('tags.create');
  }

  /**
   * @param DeleteTagRequest $objRequest
   * @param Tag $objTag
   */
  public function delete(DeleteTagRequest $objRequest, Tag $objTag) {
    return redirect()
      ->back()
      ->with($objTag->delete() ? [
        'stringSuccess' => 'Tag succesvol verwijderd!',
      ] : [
        'stringError' => 'Tag onsuccesvol verwijderd!',
      ]);
  }

  /**
   * @param EditTagRequest $objRequest
   * @param Tag $objTag
   */
  public function edit(EditTagRequest $objRequest, Tag $objTag) {
    return view('tags.edit');
  }

  public function index() {
    return view('tags.index');
  }

  /**
   * @param ShowTagRequest $objRequest
   * @param Tag $objTag
   */
  public function show(ShowTagRequest $objRequest, Tag $objTag) {
    return view('tags.show');
  }

  /**
   * @param StoreTagRequest $objRequest
   */
  public function store(StoreTagRequest $objRequest) {
    return redirect()
      ->back()
      ->with(Tag::create($objRequest->all()) ? [
        'stringSuccess' => 'Tag succesvol aangemaakt!',
      ] : [
        'stringError' => 'Specificatie onsuccesvol aangemaakt!',
      ]);
  }

  /**
   * @param UpdateTagRequest $objRequest
   * @param Tag $objTag
   */
  public function update(UpdateTagRequest $objRequest, Tag $objTag) {
    return redirect()
      ->back()
      ->with($objTag->update($objRequest->all()) ? [
        'stringSuccess' => 'Tag succesvol aangepast!',
      ] : [
        'stringError' => 'Tag onsuccesvol aangepast!',
      ]);
  }
}
