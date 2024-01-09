<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنشئات التي تم ترخيصها</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            position: relative;
        }

        


        .header {
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 1000;
            text-align: center;
        }
        .table-container {
            overflow-y: auto;
            max-height: calc(100vh - 50px);
            position: sticky;
            bottom: 0;
            background-color: white;
            z-index: 1001; /* زيادة قيمة z-index */
        }
        table {
            border-color: black;
            border: 1px solid;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
        }
        .org tr :nth-child(odd){
            font-weight: bold;
        }
        .bill {
            font-weight: bold;
        }
        thead {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;
            z-index: 1000;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }



        tbody {
            overflow-y: scroll;
            max-height: 300px;
        }

    </style>
</head>

<body dir="rtl">
    <div class="">
        <div style="background-color: white" class="row header text-center mt-4 mb-2 ">
            <div  class="col ">
                <div >
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
            <div class="col ">
                <div >
                    <img src="{{asset('report/بسم الله.png')}}" width="150" alt="بسم الله ">
                    <br>

                    <img src="{{ asset('report/yemen.png') }}" alt="yemen" width="150">
                    <div >
                        <h2>
                            المنشاءات التي تم ترخيصها الى تاريخ
                        </h2>
                    </div>
                </div>

            </div>
            <div class="col  d-flex justify-content-center flex-column">
                <div >
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
        <div class="table-container" >

            <table class="table  table-bordered border-dark ">
                <div class="">
                    <thead style="position: static " >
                        <tr  class="  table-warning text-center">
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
                <tbody>
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
                </tbody>

            </table>



        </div>
    </div>

</body>

</html>
