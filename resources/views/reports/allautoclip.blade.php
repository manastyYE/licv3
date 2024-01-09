<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنشئات التي تم ترخيصها</title>
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
        .org tr :nth-child(odd){
            font-weight: bold;
        }
        .bill {
            font-weight: bold;
        }
    </style>
</head>

<body dir="rtl">
    <div class="">
        <div  class="row text-center mt-4 mb-2 position-fixed">
            <div  class="col position-fixed top-10 start-100 translate-middle">
                <div style="margin-top: 20mm; margin-right: 90mm;">
                    <img src="{{asset('report/الحمهورية اليمنية.png')}}" width="150" alt="الجمهورية اليمنية">
                <h4 class="mt-2">
                    أمانة العاصمة
                </h4>
                <h5 class="">
                    مديرية الوحدة
                </h5>
                <h6>
                    مكتب الاشغال
                </h6>
                </div>

            </div>
            <div class="col position-fixed top-10 start-50 translate-middle">
                <div style="margin-top: 50mm;">
                    <img src="{{asset('report/بسم الله.png')}}" width="150" alt="بسم الله ">
                    <br>

                    <img src="{{ asset('report/yemen.png') }}" alt="yemen" width="150">
                    <div style="margin-top: 20mm;">
                        <h2>
                            المنشاءات التي تم ترخيصها الى تاريخ
                        </h2>
                    </div>
                </div>

            </div>
            <div class="col position-fixed top-10 start-0 translate-middle d-flex justify-content-center flex-column">
                <div style="margin-top: 20mm; margin-left: 90mm;">
                    <h4>
                        ادارة النظم والمعلومات
                    </h4>
                    <h4>
                        النظام الالي
                    </h4>
                </div>
            </div>
        </div>
        <hr  >
        <div style="margin-top: 70mm;">

            <table class="table  table-bordered border-dark text-center">
                <div class="position-fixed">
                    <thead class="" >
                        <tr  class="  table-warning">
                            <th>
                                #
                            </th>
                            <th>
                                الرقم الالي
                            </th>
                            <th>
                                اسم النشاط
                            </th>
                            <th>
                                اسم المالك
                            </th>
                            <th>
                                دعاية واعلان
                            </th>
                            <th>
                                رقم السند
                            </th>
                            <th>
                                التاريخ
                            </th>
                            <th>
                                محلية
                            </th>
                            <th>
                                رقم السند
                            </th>
                            <th>
                                التاريخ
                            </th>

                        </tr>
                    </thead>
                </div>
                <?php $i=1 ?>
                @forelse ($clips as $clip )
                <tr class="">
                    <td>
                        {{ $i++ }}
                    </td>

                    <td>
                        {{ $clip->id }}
                    </td>
                    <td>
                        {{ $clip->org->org_name }}
                    </td>
                    <td>
                        {{ $clip->org->owner_name }}
                    </td>
                    <td>
                        {{ $clip->total_ad + $clip->clean_pay + $clip->clean }}
                    </td>
                    <td>
                        {{ $clip->ad_reseve }}
                    </td>
                    <td>
                        {{ $clip->ad_reseve_date }}
                    </td>
                    <td>
                        {{ $clip->local_fee}}
                    </td>
                    <td>
                        {{ $clip->local_reseve }}
                    </td>
                    <td>
                        {{ $clip->local_reseve_date}}
                    </td>

                </tr>
                @empty

                @endforelse

            </table>



        </div>
    </div>

</body>

</html>
