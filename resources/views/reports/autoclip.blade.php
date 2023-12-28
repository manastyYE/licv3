<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حافظة النظام الالي {{ $clip->id }} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
        }
        table {
            border-color: black;
            border: 1px solid;

        }
    </style>
</head>

<body dir="rtl">
    <div class="container">
        <div class="row text-center mt-4">
            <div class=" col  ">
                <img src="{{asset('report/الحمهورية اليمنية.png')}}" width="150" alt="الجمهورية اليمنية">
                <h4>
                    أمانة العاصمة
                </h4>
                <h5>
                    مديرية الوحدة
                </h5>
                <h6>
                    مكتب الاشغال
                </h6>
            </div>
            <div class="col">
                <img src="{{asset('report/بسم الله.png')}}" width="150" alt="بسم الله ">
                <br>

                <img src="{{ asset('report/yemen.png') }}" alt="yemen" width="150">

            </div>
            <div class="col">
                <h4>
                    ادارة النظم والمعلومات
                </h4>
                <h4>
                    النظام الالي
                </h4>
            </div>
        </div>
        <div class="   ">
            <table class="table   text-center">
                <tr class="table-warning">
                    <td>
                        <h3>
                            حافظة النظام الالي
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td scope="col">
                        بيانات تعريفية
                    </td>
                </tr>
            </table>
            <table class="table table-bordered border-dark text-center">
                <tr>
                    <td class="bg-info col-1">
                    الاسم رباعيا
                    </td>
                    <td class="col-3 border-dark ">
                        {{ $clip->org->owner_name}}
                        <!-- الاسم الرباعي -->
                    </td>
                    <td class="bg-info col-2">
                        رقم التلفون
                    </td>
                    <td>
                        {{$clip->org->owner_phone}}
                        <!-- رقم الهاتف -->
                    </td>
                    <td class="bg-info col-2 ">
                        اسم الشهرة
                    </td>
                    <td>
                        {{$clip->org->org_name}}
                        <!-- اسم الشهرة -->
                    </td>

                </tr>
                <tr>
                    <td class="bg-info col-2">
                        نوع النشاط
                    </td>
                    <td>
                        {{$clip->org->org_type->name}}
                        <!-- نوع النشاط -->
                    </td>
                    <td class="bg-info col-2">
                        العنوان
                    </td>
                    <td>
                        {{$clip->org->street->name}}
                        <!-- العنوان -->
                    </td>
                    <td class="bg-info col-2">
                        الحي
                    </td>
                    <td>
                        {{$clip->org->street->hood_unit->hood->name}}
                        <!-- الحي -->
                    </td>

                </tr>

            </table>
            <table class="table border-dark  text-center ">
                <tr>
                    <td class="">
                        بيانات اللوحة الدعاية
                    </td>
                </tr>
                <tr>
                    <td class=" bg-info">
                        بيانات اللوحة
                    </td>
                </tr>
            </table>
            <table class="table table-bordered border-dark    text-center " style="margin-top: -5mm;">

                <tr class="bg-info">
                    <td>
                        امامي
                    </td>
                    <td>
                        جانبي
                    </td>
                    <td>
                        جداري
                    </td>
                    <td>
                        سطحية
                    </td>
                    <td>
                        حروف
                    </td>
                    <td>
                        لواصق
                    </td>
                    <td>
                        غيرها
                    </td>
                </tr>
                <tr class="">
                    <td>
                        {{$clip->infront_count}}
                        <!-- امامي -->
                    </td>
                    <td>
                        {{$clip->sideof_count}}
                        <!-- جانبي -->
                    </td>
                    <td>
                        {{$clip->wall_count}}
                        <!-- جداري -->
                    </td>

                    <td>
                        {{$clip->roof_count}}
                        <!-- سطحية -->
                    </td>
                    <td>
                        {{$clip->glass_stickers}}
                        <!-- حروف -->
                    </td>
                    <td>
                        {{$clip->door_stickers}}
                        <!-- لواصق -->
                    </td>
                    <td>
                        0
                        <!--     -->
                    </td>
                </tr>



            </table>
            <table class="table text-center table-bordered border-dark"> <tr>
                <td>
                    بيانات مالية مستحقة
                </td>
            </tr></table>
            <table class="table  table-bordered border-dark text-center" style="margin-top: -5mm;" >

                    <tr class="bg-info">
                        <td class="col-2">
                            الرسوم
                        </td>
                        <td class="col-2">
                            المبلغ
                        </td>
                        <td class="col-4">
                            ارقام السندات
                        </td>
                        <td class="col-2">
                            التاريخ
                        </td>
                        <td class="col-2">

                            ملاحظات
                        </td>
                    </tr>
                    <tr class="">
                        <td class="col-2 bg-info">
                            رسوم محلية
                        </td>
                        <td class="col-2">
                            {{$clip->local_fee}}
                            <!-- المبلغ -->
                        </td>
                        <td class="col-4">

                                {{$clip->local_reseve}}

                            <!-- ارقام السندات -->
                        </td>
                        <td class="col-2">

                                {{$clip->local_reseve_date}}

                            <!-- التاريخ -->
                        </td>
                        <td class="col-2">
                            {{$clip->local_reseve_note}}

                            <!-- ملاحظات -->
                        </td>
                    </tr>
                    <tr class="">
                        <td class="col-2 bg-info">
                            اخرى
                        </td>
                        <td class="col-2">
                            {{$clip->el_gate}}
                            <!-- المبلغ -->
                        </td>
                        <td class="col-4">

                            <!-- ارقام السندات -->
                        </td>
                        <td class="col-2">
                            <!-- التاريخ -->
                        </td>
                        <td class="col-2">
                            {{$clip->el_gate_reseve_note}}
                            <!-- ملاحظات -->
                        </td>
                    </tr>
                    <tr class="">
                        <td class="col-2 bg-info">
                            دعاية واعلان
                        </td>
                        <td class="col-2">
                            {{$clip->total_ad}}
                            <!-- المبلغ -->
                        </td>
                        <td class="col-4">
                            {{ $clip->ad_reseve}}
                            <!-- ارقام السندات -->
                        </td>
                        <td class="col-2">
                            {{$clip->ad_reseve_date}}
                            <!-- التاريخ -->
                        </td>
                        <td class="col-2">
                            {{$clip->ad_reseve_note}}
                            <!-- ملاحظات -->
                        </td>
                    </tr>
                    <tr class="">
                        <td class="col-2 bg-info">
                            نظافة
                        </td>
                        <td class="col-2">
                            {{$clip->clean_pay}}
                            <!-- المبلغ -->
                        </td>
                        <td class="col-4">
                            {{$clip->clean_reseve}}
                            <!-- ارقام السندات -->
                        </td>
                        <td class="col-2">
                            {{$clip->clean_reseve_date}}
                            <!-- التاريخ -->
                        </td>
                        <td class="col-2">
                            {{$clip->clean_reseve_note}}
                            <!-- ملاحظات -->
                        </td>
                    </tr>
                    <tr class="">
                        <td class="col-2 bg-info">
                            نظافة مهن
                        </td>
                        <td class="col-2">
                            <!-- المبلغ -->
                        </td>
                        <td class="col-4">
                            <!-- ارقام السندات -->
                        </td>
                        <td class="col-2">
                            <!-- التاريخ -->
                        </td>
                        <td class="col-2">

                            <!-- ملاحظات -->
                        </td>
                    </tr>
                    <tr class="">
                        <td class="col-2 bg-info">
                            الاجمالي
                        </td>
                        <td class="col-2">
                            <!-- المبلغ -->
                            {{ $clip->total_ad + $clip->local_fee + $clip->el_gate + $clip->clean_pay }}
                        </td>
                        <td colspan="3" >
                            {{$ar_total}}
                            <!-- ارقام السندات -->
                        </td>

                    </tr>
            </table>
            <table class="table table-borderless text-center">
                <tr>
                    <td>
                        النظام الالي
                    </td>
                    <td>
                        المفتش
                    </td>
                    <td>
                        مندوب الصندوق
                    </td>
                    <td>
                        رئيس القسم
                    </td>
                    <td>
                        النائب للبلديات
                    </td>
                </tr>
            </table>

        </div>
    </div>

</body>

</html>
