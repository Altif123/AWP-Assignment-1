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
                <div class="text-left bg-white h-auto p-4 md:max-w-xl md:p-6 lg:p-8 shadow-xl rounded mx-2 md:mx-0 z-50">
                    <h2 class="text-2xl">Help Section</h2>
                    <p>Hello welcome to the help section which will show you how our site works</p>
                    <ul class="list-decimal m-4">
                        <li></li>
                        <li>Neque nemo earum eaque vel aperiam cupiditate. Quae quam dolorum eaque</li>
                        <li>Vel aperiam cupiditate. Quae quam dolorum eaque</li>
                        <li>Nemo earum eaque vel aperiam cupiditate. Quae quam dolorum eaque</li>
                        <li>Eaque cupiditate eos illo debitis quod neque deserunt itaque velit, earum doloribus</li>
                    </ul>
                    <button class="text-blue-400 " type="button" @click="close">

                        close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class ="fixed pin z-40 overflow-auto right-0" x-data="{ 'showModal': false }" @keydown.escape="showModal = false">--}}
{{--<div--}}
        {{--x-data="isDialogOpen()"--}}
        {{--@toggle-modal.window="modal = !modal"--}}
        {{--x-init="$watch('modal', (val) => { if (val) document.body.classList.add('modal-open') } )">--}}
    {{--<button id="helpBtn" class="far z-50 fa-question-circle right-0" style="color:#7c827d" @click="showModal = true">--}}
        {{--Help--}}
    {{--</button>--}}

    {{--<div class="top-300 left-0 w-full h-full flex items-center justify-center z-50"--}}
         {{--x-show="showModal">--}}
        {{--<div class="text-left bg-white h-auto p-4 md:max-w-xl md:p-6 lg:p-8 shadow-xl rounded mx-2 md:mx-0 z-50"--}}
             {{--@click.away="showModal = false">--}}
            {{--<h2 class="text-2xl">Help Section</h2>--}}
            {{--<p>Hello welcome to the help section which will show you how our site works</p>--}}
            {{--<ul class="list-decimal m-4">--}}
                {{--<li></li>--}}
                {{--<li>Neque nemo earum eaque vel aperiam cupiditate. Quae quam dolorum eaque</li>--}}
                {{--<li>Vel aperiam cupiditate. Quae quam dolorum eaque</li>--}}
                {{--<li>Nemo earum eaque vel aperiam cupiditate. Quae quam dolorum eaque</li>--}}
                {{--<li>Eaque cupiditate eos illo debitis quod neque deserunt itaque velit, earum doloribus</li>--}}
            {{--</ul>--}}
            {{--<div class="flex justify-center mt-8">--}}
                {{--<button class="bg-gray-700 text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none"--}}
                        {{--@click="showModal = false">Close--}}
                {{--</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}