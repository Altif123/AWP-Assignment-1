<script>

    function helpModalOpen() {
        return {
            modal: false,
            open() { this.modal = true;document.body.classList.add("modal-open"); },
            close() { this.modal = false;document.body.classList.remove("modal-open"); },
            isOpen() { return this.modal === true },
        }
    }
</script>

<div x-data="helpModalOpen()" @toggle-modal.window="modal = !modal">
    <div class="overflow-auto right-0 space-x-10" style="background-color: rgba(0, 0, 0, 0.75);display:none" x-show="isOpen()"
         :class="{ 'user-history-modal': isOpen() }">
        <div class="flex md:justify-center mb-6 bg-white shadow-2xl fixed pin z-40 overflow-auto right-0" x-show="isOpen()" @click.away="close">
            <div class="top-300 w-full h-full flex items-center justify-center ">
                <div class="text-left bg-background-main h-auto p-4 md:max-w-xl md:p-6 lg:p-8 shadow-xl rounded mx-2 md:mx-0 z-50">
                    <h2 class="text-2xl">Help Section</h2>
                    <p>Hello welcome to the help section which will show you how our site works</p>
                    <ul class="list-disc m-5 py-2 px-2">
                        <p class="py-2 px-2 underline"> Menu page </p>
                        <li> The menu page will allow you view our menu. You can add to the menu by selecting the new
                        Add New Dish button, this will take you to a page where you can enter a new dish. When entering
                            a new dish please ensure you fill all the fields.
                        </li>
                        <p class="underline"><i class="py-2 px-2 fas fa-edit"></i> Editing/updating </p>
                        <li> When viewing a dish you can edit dish details, remove the dish from the menu and add the
                        dish to your favorites using the buttons located at the bottom of the page.</li>
                        <p class="underline" ><i class="py-2 px-2 fas fa-star"></i> How the favorites work </p>
                        <li>If you want to add an dish to your favorites section select the Add to favorites button
                        if you then visit the favorites page all your favorite dishes will show up there. To remove
                            from favorites select the delete button
                        </li>
                        <p class="py-2 px-2 underline"> How darkmode works </p>
                        <li>
                            If you have any visual impairments you can switch the theme to dark mode which may improve your
                            experience of the site. To activate dark mode simply select the check box in the
                        </li>
                    </ul>
                    <button class="text-blue-400 " type="button" @click="close">
                        close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

