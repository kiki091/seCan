<!-- Footer-->
<footer>
    <div class="container text-center section-padding-y">
        <div class="row px-4">
            <div class="col-lg-3 mx-auto text-left">
                <h6 class="text-uppercase mb-4">Kontak </h6>
                <h4 class="text-sm">salam@secan.id</h4>

                <p class="text-sm text-uppercase mt-5">
                    Ikuti Kabar Kami
                </p>

                <ul class="list-unstyled d-flex flex-md-row align-items-md-center">

                    <li class="m-3">
                        <a href="">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    
                    </li>

                    <li class="m-3">
                        <a href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                    
                    </li>

                    <li class="m-3">
                        <a href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                    
                    </li>
                </ul>
            </div>
            <div class="col-lg-5 mx-auto">
                <ul class="address text-left">
                    <li class="mb-3 d-flex">
                        <i class="fas fa-home mr-4"> </i>Green Sedayu Biz Park DM 16 No.36 <br /> 
                        Jl. Daan Mogot Km 18, Kalideres Jakarta Barat
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="fas fa-phone mr-4"> </i>
                        021-22527412, 021-528424
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="fas fa-mail-bulk mr-4"> </i>
                        halo@secan.id <br />
                        marketing@secan.id
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 mx-auto" id="subscribe">
                <p class="text-sm text-uppercase mb-5">
                    Berlangganan
                </p>

                <form action="{{ route('storeSubscribe') }}" method="POST" id="form_subscribe" @submit.prevent>
                    <div class="form-group mb-4 d-flex">
                        <input type="text" name="fullname" v-model="models.fullname" placeholder="Nama Lengkap" class="form-subscribe">
                        
                    </div>
                    <span class="text-left pl-2 text-error mb-3 d-block" id="field_fullname"></span>
                    <div class="form-group mb-4 d-flex">
                        <input type="email" name="email" v-model="models.email" placeholder="Email" class="form-subscribe">
                        
                    </div>
                    <span class="text-left pl-2 text-error mb-3 d-block" id="field_email"></span>
                    <div class="form-group d-flex">      
                    {{ csrf_field() }}	  
                        <button type="submit" class="btn btn-dark p-3" @click="storeSubscribe">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>


@section('scripts')

<script>
    var subscribe = new Vue({
        el: "#subscribe",
        data: {
            models: {
                fullname: '',
                email: '',
            }
        },

        methods: {

            storeSubscribe: function() {

                try {

                    var vm = this;

                    var optForm = {
                        dataType: "json",
                        beforeSerialize: function (form, options) {
                            // showLoading()
                        },
                        beforeSend: function () {
                            vm.clearErrorMessage();

                        },
                        success: function (response) {
                            if (response.status == false) {
                                if (response.is_error_form_validation) {

                                    var message_validation = []
                                    $.each(response.message, function (key, value) {

                                        $('input[name="' + key.replace('.', '_') + '"]').focus();
                                        $('#field_' + key.replace('.', '_')).text(value)
                                    });


                                } else {
                                    notify('Error!', response.message, 'error');

                                }
                            } else {

                                vm.clearErrorMessage();
                                vm.resetForm()
                                notify('Success!', 'Subscribe berhasil, terimaksih.', 'success');

                            }
                        },
                        complete: function (response) {
                            // hideLoading()
                        }

                    };
                    $("#form_subscribe").ajaxForm(optForm);
                    $("#form_subscribe").submit();
                    
                } catch (error) {
                    
                }
            },

            clearErrorMessage: function() {
                $('.text-error').text('')
            },

            resetForm: function() {
                this.models = {
                    fullname: '',
                    email: ''
                }
            }
        }
            
    });
</script>
@stop