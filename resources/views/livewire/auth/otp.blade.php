<div class="card max-width-300">
    <div class="card-body ">
        <div class="text-center">

            <div class=" mx-auto"> <!-- Center the image -->
                <img class="w-50 animate__animated animate__pulse" src="/Gifs/OTP-gif.gif" alt="OTP GIF">
            </div>


            <h4> Enter OTP</h4>
            <br>
            <form wire:submit.prevent="login">

                <div class="mb-3">
                    <input type="text" id='input-1' class="otp-input" autofocus onkeyup="autofocusNext('input-2')"
                           maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                    <input type="text" id='input-2' onkeyup="autofocusNext('input-3')" class="otp-input" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                    <input type="text" id='input-3'  onkeyup="autofocusNext('input-4')" class="otp-input" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                    <input type="text" id='input-4'  onkeyup="autofocusNext('input-5')" class="otp-input" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                    <input type="text" id='input-5'  onkeyup="autofocusNext('input-6')" class="otp-input" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                    <input type="text" id='input-6'  class="otp-input" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />

                </div>

                @if ($errors->any())
                    <div class="alert alert-danger m-0 mt-3">
                        @foreach ($errors->all() as $error)
                            <p class="m-0">{{ $error }}</p>
                        @endforeach
                    </div><br>
                @endif

                <button type="submit" class="otp-button btn btn-secondary btn-sm mt-3 px-3">Proceed
                </button>

            </form>
        </div>

    </div>
    @push('js')
        <script>

            function autofocusNext(id) {
                const nextInput = document.getElementById(id);
                if (nextInput) {
                    nextInput.focus();
                }
            }

        </script>
    @endpush
</div>
