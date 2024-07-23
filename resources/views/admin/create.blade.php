<x-dashboard></x-dashboard>

    <div class="rounded-lg dark:border-gray-700">
        <div class="bg-white dark:bg-gray-900 pt-4 sm:ml-64 h-screen">
            <div class="my-20 py-4 px-4  mx-auto max-w-2xl lg:py-8 bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">Add a new Category</h2>
                <form action="#">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <input type="text" name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type product category" required="">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon</label>
                            <input type="file" name="icon" id="icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " placeholder="Upload icon" required="">
                        </div> 
                    </div>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        Add Category
                    </button>
                </form>
            </div>
            <x-footer></x-footer>
          </div>
    </div>

  