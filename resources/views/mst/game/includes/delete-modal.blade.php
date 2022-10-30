<x-delete-modal :deleteItem="__('ゲーム')" :action="__('game/delete')">
    <div class="flex justify-center pb-5">
        <p class="mr-3 text-gray-500">ID: <strong x-text="deleteData.id"></strong></p>
        <p class="text-gray-500">タイトル: <strong x-text="deleteData.title"></strong></p>
    </div>
</x-delete-modal>