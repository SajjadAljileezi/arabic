

<div class="dashboard ">

    <div class="col-sm-4 ">
        <a href="{{ route('getitem') }}"> <h1 id="dash" class="px-5 pt-5"> الادارة</h1></a>
        <a href="{{ route('ship') }}"> <h1 id="dash"  class="px-5 ship"> اشحن </h1></a>
    </div>
</div>
<i class="fas fa-sign-in-alt fa-3x"></i>


<script type="text/javascript">
    $(".fa-sign-in-alt").click(function(){
        $('.dashboard').fadeToggle();
    });
</script>
