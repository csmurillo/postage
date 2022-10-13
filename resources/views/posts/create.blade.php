@extends('layouts.app')
@section('content')
<x-demo-modal></x-demo-modal>
<div class="relative flex flex-col px-4 sm:px-10 md:px-20 lg:px-48 xl:px-72">
    <div id="preview-create" class="hidden">
        <div class="mb-5">
            <input class="text-lg py-1 px-3 border rounded text-black bg-white" type="button" value="Back" onclick="back()"/>
        </div>
        <div id='preview-content' class="px-4">
            <h1 id="preview-title" class="text-2xl"></h1>
            <div id="preview-field-container">
            </div>
        </div>
    </div>
    <form id="create-form" action="/post" enctype="multipart/form-data" method="post" onsubmit="setContent(event);">
        @csrf
        <div class="flex gap-2 mb-4">
            <label for="image" class="text-xl">Cover Image:</label>
            <div class="flex-1 flex items-center">
                <label class="w-full bg-blue-500 text-center text-white py-1 rounded cursor-pointer" for="image">Choose Image</label>
                <input type="file" name="image" id="image" class="hidden" onchange="fileCoverImage(this);"/>
            </div>
        </div>
        <div class="flex mb-4">
            <label class="text-xl" for="title">Post Title:</label>
            <input id="title" class="flex-1 text-lg" name="title" type="text" value="{{ old('title') }}" onchange="updateTitle(this)"/>
            @error('title')
                <span class="">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="flex mb-4">
            <label for="pet-select" class="text-xl">Category:</label>

            <select class="text-xl flex-1" name="topic" id="topic" onchange="updateTopic(this)">
                <option value="">--Please choose an option--</option>
                <option value="autonomousDriving" {{old('topic')=='autonomousDriving'?'selected':''}}>Autonomous Driving</option>
                <option value="crypto" {{old('topic')=='crypto'?'selected':''}}>Crypto</option>
                <option value="hardware" {{old('topic')=='hardware'?'selected':''}}>Hardware</option>
                <option value="programmingLanguages" {{old('topic')=='programmingLanguages'?'selected':''}}>Programming Languages</option>
                <option value="rocketScience" {{old('topic')=='rocketScience'?'selected':''}}>Rocket Science</option>
                <option value="virtualReality" {{old('topic')=='virtualReality'?'selected':''}}>Virtual Reality</option>
            </select>
            @error('topic')
                <span class="">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <textarea id="content" name="content" class="hidden" placeholder="Type Here!!!" rows="10"></textarea>
        <div id="content-container" class="w-full">
            <div class="w-full mb-2 border-b-2">
                <div>
                    <div class="flex">
                        <label class="text-lg">Title:</label>
                        <input type="text" name="content-496475" class="field title flex-1 border-b-2" onkeydown="updateContent(this)"/>
                    </div>
                </div>
                <div class="relative mb-5">
                <label class="text-lg">Paragraph</label>
                <textarea name="content-496475" class="w-full paragraph border-2 field mb-4" placeholder="Type Here!!!" rows="10" onkeydown="updateContent(this)"></textarea>
                <div class="w-full flex justify-end gap-2">
                    <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addImageSection(this);" value="Add Image">
                    <input type="button" class="bg-white border p-2 rounded text-xs" onclick="addInputSection(this);" value="Add Paragraph">
                </div>
            </div>
        </div>
        @error('content')
            <span class="">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="flex justify-center gap-4">
            <div id="e" class="">
                <button type="submit" class="bg-white border p-2 rounded"  onsubmit="setContent(event);">Create Post</button>
            </div>
            <input class="border p-2 rounded bg-slate-200" type="button" onclick="previewPost()" value="Preview"/>
        </div>
    </form>
</div>

<script src="{{ asset('js/posts/create/index.js') }}"></script>
<script src="{{ asset('js/posts/inputManager.js') }}"></script>
<script src="{{ asset('js/posts/setImageSection.js') }}"></script>
<script src="{{ asset('js/posts/setInputSection.js') }}"></script>
<script src="{{ asset('js/posts/previewPost.js') }}"></script>

@endsection

