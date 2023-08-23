@extends('layouts.master')

<!-- @section('pageTitle', 'التسجيل في خدمة النقل') -->

@section('content')

<div>
  
    <form action="registerClass" method="POST" enctype="multipart/form-data"
        style="text-align: right; font-size:20px; color:#77a">

        @csrf
        <div class="form-group">
            <label style="text-align: right; font-size:20px; color:#77a" class="inputBox">اسم المشترك ثلاثي </label>
            <input style="" type="text" id="st_name" name="st_name" class="form-control" required="">
        </div>

        <div class="form-group">
            <label style="text-align: right; font-size:20px; color:#77a" class="inputBox">رمز الفئة</label>
            <input style="" type="text" id="st_class" name="st_class" class="form-control" required="">
        </div>

        <div class="form-group">
            <label style="text-align: right; font-size:20px; color:#77a" class="inputBox">رقم المشترك</label>
            <input style="" type="text" id="st_SN" name="st_SN" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">تسجيل</button>
    </form>
</div>








</script>

@endsection
