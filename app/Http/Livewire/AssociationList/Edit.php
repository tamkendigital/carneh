<?php

namespace App\Http\Livewire\AssociationList;

use App\Models\AssociationList;
use App\Models\AssociationType;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public AssociationList $associationList;

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->associationList->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(AssociationList $associationList)
    {
        $this->associationList = $associationList;
        $this->initListsForFields();
        $this->mediaCollections = [

            'association_list_association_logo' => $associationList->association_logo,

        ];
    }

    public function render()
    {
        return view('livewire.association-list.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->associationList->save();
        $this->syncMedia();

        return redirect()->route('admin.association-lists.index');
    }

    protected function rules(): array
    {
        return [
            'associationList.association_name' => [
                'string',
                'required',
                'unique:association_lists,association_name,' . $this->associationList->id,
            ],
            'associationList.association_type_id' => [
                'integer',
                'exists:association_types,id',
                'required',
            ],
            'mediaCollections.association_list_association_logo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.association_list_association_logo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'associationList.association_address' => [
                'string',
                'required',
            ],
            'associationList.website' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['association_type'] = AssociationType::pluck('association_type', 'id')->toArray();
    }
}
