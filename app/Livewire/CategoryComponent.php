<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $editID, $category, $categories, $categoryCount, $sub_category, $subCategories, $subCategoryCount;

    public $listeners = ['refreshCategory' => '$refresh'];

    //mount components
    public function mount()
    {
        $this->categories = Category::latest()->get();
        $this->subCategories = SubCategory::with('category')->latest()->get();
        $this->categoryCount = $this->categories->count();
        $this->subCategoryCount = $this->subCategories->count();
    }

    //Input fields on update validation
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'category' => 'required|unique:categories,category'
        ]);
    }

    //store category
    public function store()
    {
        // Validate
        $this->validate([
            'category' => 'required|unique:categories,category',
        ]);
        // Store the category
        Category::create([
            'category' => $this->category,
            'status' => '1',
        ]);
        // flash toast message
        toastr()->success('Category created successfully!');
        $this->reset(['category', 'editID']);
        $this->dispatch('close-modal');
        $this->dispatch('refreshCategory');
    }

    //store sub category
    public function subStore()
    {
        // Validate
        $this->validate([
            'category' => 'required',
            'sub_category' => 'required|unique:sub_categories,sub_category',
        ]);
        // Store the category
        SubCategory::create([
            'category_id' => $this->category,
            'sub_category' => $this->sub_category,
            'status' => '1',
        ]);
        // flash toast message
        toastr()->success('Sub-category created successfully!');
        $this->reset(['category', 'sub_category', 'editID']);
        $this->dispatch('close-modal');
        $this->dispatch('refreshCategory');
    }

    //edit category
    public function edit($id)
    {
        $editCategory = Category::find($id);
        $this->editID = $editCategory->id;
        $this->category = $editCategory->category;
        $this->dispatch('show-edit-modal');
    }

    //edit sub category
    public function subEdit($id)
    {
        $editSubCategory = SubCategory::find($id);
        $this->editID = $editSubCategory->id;
        $this->category = $editSubCategory->category_id;
        $this->sub_category = $editSubCategory->sub_category;
        $this->dispatch('show-sub-edit-modal');
    }

    //update category
    public function update()
    {
        // Validate
        $this->validate([
            'category' => 'required|unique:categories,category,' . $this->editID . '',
        ]);
        // update category
        $updateCategory = Category::find($this->editID);
        $updateCategory->category = $this->category;
        $updateCategory->save();
        // flash toast message
        toastr()->success('Category updated successfully!');
        $this->dispatch('close-modal');
        $this->reset(['category', 'editID']);
        $this->dispatch('refreshCategory');
    }

    //update sub category
    public function subUpdate()
    {
        // Validate
        $this->validate([
            'category' => 'required',
            'sub_category' => 'required|unique:sub_categories,sub_category,' . $this->editID . '',
        ]);
        // update category
        $updateSubCategory = SubCategory::find($this->editID);
        $updateSubCategory->category_id = $this->category;
        $updateSubCategory->sub_category = $this->sub_category;
        $updateSubCategory->save();
        // flash toast message
        toastr()->success('Sub-category updated successfully!');
        $this->dispatch('close-modal');
        $this->reset(['category', 'sub_category', 'editID']);
        $this->dispatch('refreshCategory');
    }

    //delete confirmation
    public function deleteConfirmation($id)
    {
        $this->editID = $id;
        $this->dispatch('show-delete-confirmation-modal');
    }

    //delete sub confirmation
    public function deleteSubConfirmation($id)
    {
        $this->editID = $id;
        $this->dispatch('show-sub-delete-confirmation-modal');
    }

    //delete category
    public function delete()
    {
        Category::destroy($this->editID);
        // flash toast message
        toastr()->success('Category deleted successfully!');
        $this->dispatch('close-modal');
        $this->reset(['category', 'editID']);
        $this->dispatch('refreshCategory');
    }

    //delete sub category
    public function subDelete()
    {
        SubCategory::destroy($this->editID);
        // flash toast message
        toastr()->success('Sub-category deleted successfully!');
        $this->dispatch('close-modal');
        $this->reset(['category', 'sub_category', 'editID']);
        $this->dispatch('refreshCategory');
    }


    public function render()
    {
        return view('livewire.category-component', [
            'categories' => $this->categories,
            'subCategories' => $this->subCategories,
            'categoryCount' => $this->categoryCount,
            'subCategoryCount' => $this->subCategoryCount,
        ]);
    }
}
