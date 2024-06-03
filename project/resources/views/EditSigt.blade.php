<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Sigt') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Admin - Manage Tutorials</h1>
        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="showForm()">Add New Tutorial</button>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-8">
            @foreach($tutorials as $tutorial)
                <div class="bg-gray-800 rounded-lg overflow-hidden shadow-md text-white">
                    <img src="{{ asset('storage/' . $tutorial->image) }}" alt="{{ $tutorial->title }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-2">{{ $tutorial->title }}</h2>
                        <ul class="list-disc list-inside">
                            @foreach($tutorial->steps as $step)
                                <li class="mb-2">{{ $step->step_number }}. {{ $step->description }}</li>
                            @endforeach
                        </ul>
                        <div class="flex justify-end mt-4">
                            <button type="button" class="bg-yellow-500 text-white px-4 py-2 rounded" onclick="editTutorial({{ $tutorial->toJson() }})">Edit</button>
                            <form action="{{ route('admin.tutorials.destroy', $tutorial) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded ml-2">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="tutorialForm" class="mt-8 hidden">
            <h2 id="formTitle" class="text-2xl font-semibold mb-4">Add Tutorial</h2>
            <form action="{{ route('admin.tutorials.storeOrUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="tutorial_id" id="tutorial_id">
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-bold mb-2">Image:</label>
                    <input type="file" id="image" name="image" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div id="steps">
                    <div class="mb-4">
                        <label for="steps[]" class="block text-gray-700 font-bold mb-2">Step 1:</label>
                        <textarea name="steps[]" class="w-full p-2 border border-gray-300 rounded" rows="3" required></textarea>
                    </div>
                </div>
                <button type="button" onclick="addStep()" class="bg-blue-500 text-white px-4 py-2 rounded">Add Step</button>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded ml-4">Save</button>
            </form>
        </div>
    </div>

    <script>
    function showForm() {
        document.getElementById('tutorialForm').classList.remove('hidden');
        document.getElementById('formTitle').innerText = 'Add Tutorial';
        document.getElementById('tutorial_id').value = '';
        document.getElementById('title').value = '';
        document.getElementById('image').value = '';
        document.getElementById('steps').innerHTML = `<div class="mb-4">
            <label for="steps[]" class="block text-gray-700 font-bold mb-2">Step 1:</label>
            <textarea name="steps[]" class="w-full p-2 border border-gray-300 rounded" rows="3" required></textarea>
        </div>`;
    }

    function editTutorial(tutorial) {
        document.getElementById('tutorialForm').classList.remove('hidden');
        document.getElementById('formTitle').innerText = 'Edit Tutorial';
        document.getElementById('tutorial_id').value = tutorial.id;
        document.getElementById('title').value = tutorial.title;
        let stepsHtml = '';
        tutorial.steps.forEach((step, index) => {
            stepsHtml += `<div class="mb-4">
                <label for="steps[]" class="block text-gray-700 font-bold mb-2">Step ${index + 1}:</label>
                <textarea name="steps[]" class="w-full p-2 border border-gray-300 rounded" rows="3" required>${step.description}</textarea>
            </div>`;
        });
        document.getElementById('steps').innerHTML = stepsHtml;
    }

    function addStep() {
        const stepCount = document.querySelectorAll('#steps > div').length;
        const stepNumber = stepCount + 1;
        const stepContainer = document.createElement('div');
        stepContainer.classList.add('mb-4');
        
        const label = document.createElement('label');
        label.setAttribute('for', 'steps[]');
        label.classList.add('block', 'text-gray-700', 'font-bold', 'mb-2');
        label.textContent = `Step ${stepNumber}:`;
        stepContainer.appendChild(label);

        const textarea = document.createElement('textarea');
        textarea.name = 'steps[]';
        textarea.classList.add('w-full', 'p-2', 'border', 'border-gray-300', 'rounded');
        textarea.setAttribute('rows', '3');
        textarea.required = true;
        stepContainer.appendChild(textarea);

        document.getElementById('steps').appendChild(stepContainer);
    }
    </script>
</x-app-layout>
