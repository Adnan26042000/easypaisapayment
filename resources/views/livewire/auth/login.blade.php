<div class="card ">

    @if ($errors->any())
        <div class="card-body pb-0   text-center">
            <div class="d-flex justify-content-center">
                <div class="error-background p-1 text-align-left border-radius-4">
                    @foreach ($errors->all() as $error)
                        <p class="font-easypaisa  font-size-0-7 m-0 px-3">{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        </div>

    @endif

    <div class="card-body row pt-0">
        <div class="col text-center">
            <br>


            <p class="font-easypaisa  font-size-0-9 mt-2 mb-0">
                Send money easily to your <br>employees with our streamlined <br> payment system.
            </p>
        </div>

        <div class="col text-align-center">

            <br>
            <h5 class="font-easypaisa mt-1 mb-2"> Enter Credentials</h5>


            <form wire:submit.prevent="loginAccount" class="text-center">

                <div class="mb-3 mx-auto w-75">
                    <input type="number" class="form-control" wire:model="credentials.phone_no"
                           placeholder="Phone Number" autofocus style="padding: 10px; height: 40px;">
                </div>

                <div class="w-100 grid-gap-2">
                    <input type="text" id='input-1' class="otp-input" wire:model="credentials.pin.0"
                           onkeyup="if(this.value.length > 0) autofocusNext('input-2')"
                           maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');"/>
                    <input type="text" id='input-2'   onkeyup="if(this.value.length > 0)  autofocusNext('input-3')" class="otp-input" maxlength="1"
                           wire:model="credentials.pin.1" oninput="this.value=this.value.replace(/[^0-9]/g,'');"/>
                    <input type="text" id='input-3'   onkeyup="if(this.value.length > 0)  autofocusNext('input-4')" class="otp-input" maxlength="1"
                           wire:model="credentials.pin.2" oninput="this.value=this.value.replace(/[^0-9]/g,'');"/>
                    <input type="text" id='input-4'   onkeyup="if(this.value.length > 0)  autofocusNext('input-5')" class="otp-input" maxlength="1"
                           wire:model="credentials.pin.3" oninput="this.value=this.value.replace(/[^0-9]/g,'');"/>
                    <input type="text" id='input-5'   onkeyup="if(this.value.length > 0)  autofocusNext('input-6')" class="otp-input" maxlength="1"
                           wire:model="credentials.pin.4" oninput="this.value=this.value.replace(/[^0-9]/g,'');"/>

                </div>

                <button type="submit" class="btn btn-success btn-sm mt-3">Sign In</button>

            </form>
        </div>

    </div>


    @push('js')
        <script>

            function autofocusNext(id) {
                const next_input = document.getElementById(id);
                if (next_input) {
                    next_input.focus();
                }
            }
        </script>
    @endpush

</div>

