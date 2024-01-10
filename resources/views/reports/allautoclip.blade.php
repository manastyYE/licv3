<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حافظة النظام الالي    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>




body {
      font-family: 'Times New Roman', Times, serif;
    }

    @media print {
      .header,
      .table-container {
        width: 100%;
        z-index: 1000;
      }

      .header {
        background-color: white;
        text-align: center;
        position: fixed;
        top: 0;

      }




      table {
        /* page-break-after: always; */
        page-break-before: avoid;
      }

      tbody.print-content {
        page-break-inside: avoid;
      }
      @media print {
    .header {
        position: fixed;
        top: 0;
    }

    thead {
        position: sticky;
        top: 0;
    }

    /* باقي الشفرة */
}

    }
    .header,
    .table-container {
      background-color: white;
    }

    img {
            width: 150px;
        }


    table {
      border-color: black;
      border: 1px solid;
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 0;
    }

    .header {
      position: sticky;
      top: 0;
      background-color: #f8f9fa;

    }

    th,
    td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }
  </style>

</head>

<body dir="rtl">
    <div class="row header text-center mt-4 mb-2">
        <div class="col">
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
        <div class="col">
            <img src="{{asset('report/بسم الله.png')}}" width="150" alt="بسم الله ">
            <br>

            <img src="{{ asset('report/yemen.png') }}" alt="yemen" width="150">

        </div>
        <div class="col d-flex justify-content-center flex-column">
            <h4>
                ادارة النظم والمعلومات
            </h4>
            <h4>
                النظام الالي
            </h4>
        </div>
    </div>

    <table class="table table-bordered border-dark">
        <thead class="header " style="top: 35mm ">



            <tr class="table-warning text-center">

                <!-- هنا تضيف رأس الجدول -->
                <th>#</th>
                <th>الرقم الالي</th>
                <th>اسم النشاط</th>
                <th>اسم المالك</th>
                <th>دعاية واعلان</th>
                <th>رقم السند</th>
                <th>التاريخ</th>
                <th>محلية</th>
                <th>رقم السند</th>
                <th>التاريخ</th>
            </tr>
        </thead>
        <tbody class="print-content">
            <?php $i=1 ?>
            @forelse ($clips as $clip )
            <tr class="">
                <td>{{ $i++ }}</td>
                <td>{{ $clip->id }}</td>
                <td>{{ $clip->org->org_name }}</td>
                <td>{{ $clip->org->owner_name }}</td>
                <td>{{ $clip->total_ad + $clip->clean_pay + $clip->clean }}</td>
                <td>{{ $clip->ad_reseve }}</td>
                <td>{{ $clip->ad_reseve_date }}</td>
                <td>{{ $clip->local_fee}}</td>
                <td>{{ $clip->local_reseve }}</td>
                <td>{{ $clip->local_reseve_date}}</td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>

    <!-- Include your footer content here -->

    <!-- Include your Bootstrap and other scripts here -->
</body>

</html>
