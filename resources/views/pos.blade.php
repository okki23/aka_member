@extends('layouts.app')

@section('content')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-file">
                                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                        <polyline points="13 2 13 9 20 9"></polyline>
                                    </svg></div>
                                POS (Point of Sale)
                            </h1>
                            <div class="page-header-subtitle">Halaman untuk melakukan transaksi jual beli</div>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="card">
                <div class="card-header">Point of Sale</div>
                <div class="card-body">

                    <div class="col-lg-12">
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="fakturno">Faktur No</label>
                                <input class="form-control" id="fakturno" name="fakturno" type="text"
                                    readonly="readonly" value="FP{{ $faktur }}">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Date Transcation</label>
                                <input class="form-control" id="date_trans" name="date_trans" type="text"
                                    readonly="readonly" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Visit Type</label>
                                {{-- <input class="form-control" id="inputFirstName" type="text"  > --}}
                                <select name="visit_type" id="visit_type" class="form-control">
                                    <option value="1">New</option>
                                    <option value="2">Renew</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Marketing Referal</label>
                                <select name="id_marketing_referal" id="id_marketing_referal" class="form-control">
                                    @foreach ($marketing_ref as $mf => $vmf)
                                        @if ($vmf->id != 1)
                                            <option value="{{ $vmf->id }}"> {{ $vmf->employee_name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <img src="{{ asset('assets/img/aka.png') }}" alt="">
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">ID Member</label>
                                <input class="form-control" id="id_member" name="id_member" readonly="readonly"
                                    type="text">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Member Name</label>
                                <input class="form-control" id="member_name" name="member_name" readonly="readonly"
                                    type="text">
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Member Referal </label>
                                <select name="id_member_referal" id="id_member_referal" class="form-control">
                                    @foreach ($member_ref as $mmf => $vmmf)
                                        <option value="{{ $vmmf->id }}"> {{ $vmmf->member_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">

                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <button type="button" id="search" onclick="SearchMember();"
                                class="btn btn-primary btn-block"> Search Member</button>
                            <button type="button" id="service" onclick="SearchService();"
                                class="btn btn-success btn-block"> Add Service</button>
                        </div>
                    </div>
                    <hr>
                    <table class="table">
                        <thead id="thead">
                            <tr>
                                <th>Service Code</th>
                                <th>Service Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Discount</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="item_list">

                        </tbody>
                    </table>
                    <table class="table table-subco">
                        <tr>
                            <td colspan="5">Sub Total</td>
                            <td id="subtotal"></td>
                        </tr>
                        <tr>
                            <td colspan="5">Diskon</td>
                            <td><input type="text" class="form-control" id="diskonset" value="0">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">Harus Dibayar</td>
                            <td id="harusbayar"></td>
                        </tr>

                    </table>

                    <br>
                    <hr>
                    <button class="btn btn-success btn-block" onclick="ParsingKasir();"> Checkout </button>
                    <button class="btn btn-danger btn-block"> Cancel </button>

                </div>
            </div>
        </div>
        <!-- Modal -->

        {{-- searchmembermodal --}}
        <div class="modal" id="SearchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Search Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="listmember">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Barcode</th>
                                    <th>Member Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- searchservicemodal --}}
        <div class="modal" id="SearchServiceModal" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Search Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <table id="listservice">
                            <thead>
                                <tr>
                                    <th>Service Code</th>
                                    <th>Service Name</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>Price</th>e
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div style="position: absolute; bottom: 1rem; right: 1rem;">
            <!-- Toast -->
            <div class="toast" id="toastSave" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-autohide="false">
                <div class="toast-header bg-primary text-white">
                    <i data-feather="bell"></i>
                    <strong class="mr-auto"> &nbsp; Pesan Sistem</strong>
                    <button class="ml-2 mb-1 btn-close" type="button" data-bs-dismiss="toast" aria-label="Close">
                    </button>
                </div>
                <div class="toast-body">Data yang diinput sudah berhasil di simpan ke database.</div>
            </div>
        </div>

        <div style="position: absolute; bottom: 1rem; right: 1rem;">
            <!-- Toast -->
            <div class="toast" id="toastDel" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-autohide="false">
                <div class="toast-header bg-primary text-white">
                    <i data-feather="bell"></i>
                    <strong class="mr-auto"> &nbsp; Pesan Sistem</strong>
                    <button class="ml-2 mb-1 btn-close" style="float:right; margin-right:10px;" type="button"
                        data-bs-dismiss="toast" aria-label="Close"> </button>
                </div>
                <div class="toast-body bg-white text-black">Data yang terpilih sudah berhasil di hapus dari database.</div>
            </div>
        </div>


        <div class="modal" id="COModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Checkout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <div class="row">
                                <div class="col order-1">
                                    <label for="" style="font-size: 20px; font-weight:bold;"> Total Bayar :
                                    </label>
                                    <br>
                                    <div id="hasilco" style="font-size: 30px; font-weight:bold;"></div>
                                    <br>
                                    <div id="sebutan" style="font-size: 20px; font-weight:bold;"></div>
                                    <br>
                                    <div id="result_bayar_page">
                                        <label for=""> Jumlah Bayar</label>
                                        <input type="text" class="form-control" id="dibayar" value="0">
                                        <br>
                                        <label for="" style="font-size: 20px; font-weight:bold; "> Kembali</label>
                                        <h6 id="kembali" style="font-size: 30px; font-weight:bold;"></h6>
                                    </div>
                                </div>
                                <div class="col order-5">
                                    <label for="tipebayar">Jenis Pembayaran</label>
                                    <select name="tipebayar" id="tipebayar" class="form-control">
                                        <option value="0" selected="selected">-- Pilih --</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Debit</option>
                                        <option value="3">Credit Card</option>
                                    </select>
                                    <br>
                                    <div id="select_cc">
                                        <select name="selectcc" id="selectcc" class="form-control">
                                            <option value="0" selected="selected">-- Pilih Kartu --</option>
                                            <option value="1">BCA</option>
                                            <option value="2">Mandiri</option>
                                            <option value="3">HSBC</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div id="select_dc">
                                        <select name="selectdc" id="selectdc" class="form-control">
                                            <option value="0" selected="selected">-- Pilih Kartu --</option>
                                            <option value="1">BCA</option>
                                            <option value="2">Mandiri</option>
                                            <option value="3">BNI</option>
                                            <option value="3">BRI</option>
                                        </select>

                                        <input type="hidden" name="totalccnya" id="totalccnya">
                                        <input type="hidden" name="basicprice" id="basicprice">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="col-lg-12">
                            <div class="row gx-3 mb-3">
                                <button type="button" id="processpayment" onclick="ProcessPayment();"
                                    class="btn btn-primary btn-block"> <i data-feather="shopping-cart"></i> &nbsp; Payment
                                    Process</button>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </main>
    <script>
        function ProcessPayment() {
            var idservices = [];
            fakturno = $("#fakturno").val();
            id_member = $("#id_member").val();
            id_member_referal = $("#id_member_referal").val();
            id_marketing_referal = $("#id_marketing_referal").val();
            visit_type = $("#visit_type").val();
            tipebayar = $("#tipebayar").val();
            diskonset = $("#diskonset").val();
            date_trans = $("#date_trans").val();
            hasilco = $("#hasilco").html();
            dibayar = $("#dibayar").val();
            kembali = $("#kembali").html();
            selectdc = $("#selectdc").val();
            selectcc = $("#selectcc").val();
            totalccnya = $("#totalccnya").val();
            basicprice = $("#basicprice").val();

            $("input[name='idservices[]']").each(function() {
                idservices.push(this.value);
            });

            console.log(idservices);
            $.ajax({
                url: "{{ route('cetakinv') }}",
                data: {
                    id_member_referal: id_member_referal,
                    idservices: idservices,
                    basicprice: basicprice,
                    fakturno: fakturno,
                    total_payment: hasilco,
                    payment: dibayar,
                    id_debit: selectdc,
                    cc_charge: totalccnya,
                    id_cc: selectcc,
                    change_payment: kembali,
                    diskon: diskonset,
                    id_member: id_member,
                    id_marketing_referal: id_marketing_referal,
                    visit_type: visit_type,
                    date_trans: date_trans,
                    tipebayar: tipebayar
                },
                type: "POST",
                success: function(data) {
                    console.log(data);
                    window.open('http://aka_member.test/invoice/' + fakturno, '_blank');
                }
            });
        }
        $("#dibayar").keyup(function() {
            var hasilco = $("#hasilco").html()
            var totals = (parseInt($(this).val())) - parseInt(hasilco);
            $("#kembali").html(totals);
            console.log(totals)
        });
        $("#tipebayar").change(function() {
            var angka = $("#harusbayar").html();
            var dsc = 0;
            var calc = 0;
            var ccs = 0;
            if ($(this).val() == 3) {
                dsc = parseFloat($(this).val() * 2 / 100);
                calc = parseFloat(angka * dsc);
                $("#kembali").html(0);
                $("#totalccnya").val(calc);

                ccs = (parseFloat(angka) + parseFloat(calc));
                $("#dibayar").val(ccs);
                $.ajax({
                    url: "{{ route('kekata') }}",
                    data: {
                        angka: ccs
                    },
                    type: "POST",
                    success: function(data) {
                        console.log(data);
                        $("#sebutan").html(data);
                    }
                });
                $("#result_bayar_page").hide();
                $("#hasilco").html(ccs);
                $("#basicprice").val(angka);
                $("#selectcc").show();
                $("#selectdc").hide();
            } else if ($(this).val() == 2) {
                $("#result_bayar_page").hide();
                $("#hasilco").html(angka);
                $("#selectcc").hide();
                $("#dibayar").val(angka);
                $("#kembali").html(0);
                $("#basicprice").val(angka);
                $("#selectdc").show();

                $.ajax({
                    url: "{{ route('kekata') }}",
                    data: {
                        angka: $("#harusbayar").html()
                    },
                    type: "POST",
                    success: function(data) {
                        console.log(data);
                        $("#sebutan").html(data);
                    }
                });
            } else {
                $("#result_bayar_page").show();
                $("#hasilco").html(angka);
                $("#selectcc").hide();
                $("#basicprice").val(angka);
                $("#selectdc").hide();

                $.ajax({
                    url: "{{ route('kekata') }}",
                    data: {
                        angka: $("#harusbayar").html()
                    },
                    type: "POST",
                    success: function(data) {
                        console.log(data);
                        $("#sebutan").html(data);
                    }
                });
            }


        });


        $("#diskonset").on("keyup", function() {
            const tots = parseInt($("#subtotal").text());
            const result = (tots - parseInt($(this).val()));
            console.log(result);
            $("#harusbayar").html(result);
        });

        function ParsingKasir() {
            var harusbayar = $("#harusbayar").html();

            $('#COModel').modal('show');
            $("#hasilco").html(harusbayar);

            $.ajax({
                url: "{{ route('kekata') }}",
                data: {
                    angka: harusbayar
                },
                type: "POST",
                success: function(data) {
                    console.log(data);
                    $("#sebutan").html(data);
                }
            });

            // var idservices = [];
            // fakturno = $("#fakturno").val();
            // id_member = $("#id_member").val();
            // id_member_referal = $("#id_member_referal").val();
            // id_marketing = $("#id_marketing").val();

            // $("input[name='idservices[]']").each(function() {
            //     idservices.push(this.value);
            // });

            // console.log(idservices);
            // $.ajax({
            //     url: "{{ route('cetakinv') }}",
            //     data: {
            //         id_member_referal: id_member_referal,
            //         idservices: idservices,
            //         fakturno: fakturno,
            //         id_member: id_member,
            //         id_marketing: id_marketing
            //     },
            //     type: "POST",
            //     success: function(data) {
            //         window.open('http://aka_member.test/cetakinv', '_blank');
            //     }
            // });

        }
        $(function() {
            $('body').on("keyup change", ".quantity", function() {
                var tr = $(this).parent().parent();

                var price = tr.find(".price").text();
                var quantity = tr.find(".quantity").val();
                var discount = tr.find(".discount").text().slice(0, -1);

                // calculate total
                var totalDiscount = ((price * quantity) * discount / 100);
                var price = (((price * quantity) - totalDiscount));
                var total = parseFloat(price).toFixed(0);
                tr.find(".total").html(total);

                // calculate grand total
                var grandTotal = 0.00;

                $("#item_list > tr > td.total").each(function(k, v) {
                    grandTotal += parseFloat(v.innerHTML);
                    $("#subtotal").html(grandTotal);
                });

            });
        });

        function calc() {
            var tr = $(this).parent().parent();

            var price = tr.find(".price").text();
            var quantity = tr.find(".quantity").val();
            var discount = tr.find(".discount").text().slice(0, -1);

            // calculate total
            var totalDiscount = ((price * quantity) * discount / 100);
            var price = (((price * quantity) - totalDiscount));
            var total = parseFloat(price).toFixed(0);
            tr.find(".total").html(total);

            // calculate grand total
            var grandTotal = 0.00;

            $("#item_list > tr > td.total").each(function(k, v) {
                grandTotal += parseFloat(v.innerHTML);
                $("#subtotal").html(parseFloat(v.innerHTML));
            });

        }

        $(document).ready(function() {
            $("#result_bayar_page").hide();
            $("#selectcc").hide();
            $("#selectdc").hide();
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('member_list') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'barcode',
                        name: 'barcode'
                    },
                    {
                        data: 'member_name',
                        name: 'member_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });

        function SearchService() {
            $('#SearchServiceModal').modal('show');

            $('#listservice').DataTable({
                processing: true,
                destroy: true,
                serverSide: true,
                ajax: "{{ route('service_list_get') }}",
                columns: [{
                        data: 'service_code',
                        name: 'service_code'
                    },
                    {
                        data: 'service_name',
                        name: 'service_name'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'qty',
                        name: 'qty'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        }

        function SearchMember() {
            $('#SearchModal').modal('show');

            $('#listmember').DataTable({
                processing: true,
                destroy: true,
                serverSide: true,
                ajax: "{{ route('member_list_get') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'barcode',
                        name: 'barcode'
                    },
                    {
                        data: 'member_name',
                        name: 'member_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        }


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function ChooseMember(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('member_get_data') }}",
                data: {
                    id: id
                },
                success: function(result) {
                    console.log(result);
                    $("#id_member").val(result.barcode);
                    $("#member_name").val(result.member_name);
                    $('#SearchModal').modal('hide');
                }
            });

        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function isNumber(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }

        function ChooseService(id) {
            let isian = '';
            var grandTotal = 0.00;
            let st = 0;
            $.ajax({
                type: "POST",
                data: {
                    id: id
                },
                url: "{{ route('service_get_data') }}",
                success: function(result) {
                    isian = '<tr><td class="servicecode">' + result.service_code +
                        ' <input type="hidden" name="idservices[]" value="' +
                        result.service_code + '"> <input type="hidden" name="qtys[]" value="' +
                        result.qty + '"> </td><td>' +
                        result
                        .service_name +
                        '</td><td class="price">' + result.price +
                        '</td><td><input type="text" class="form-control quantity" name="quantity[]" value="' +
                        result.qty +
                        '" min="1" step="1"></td><td class="discount">0</td></td><td class="total"> ' +
                        parseInt(
                            result.price * result.qty) +
                        '</td></tr>';
                    $("#item_list").append(isian);
                    $("#item_list > tr > td.total").each(function(k, v) {
                        grandTotal += parseFloat(v.innerHTML);
                        $("#subtotal").html(grandTotal);
                        $("#harusbayar").html(grandTotal);

                    });

                }
            })
        }


        function clearinput() {
            $("input").val("");
            $("#pict_view").html("");
            $("#pict_view").css('display', 'none');
        }
    </script>
@endsection
