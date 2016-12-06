</div>
<div id="dynamic" class="staticItems slideAn">

</div>
</div>

</div>






<script>
    $(document).ready(function(){
        var scroll_start = 0;
        var startChange = $('.mainTile');
        var offset = startChange.offset();
        if(startChange.length) {
            $(document).scroll(function(){
                scroll_start = $(this).scrollTop();
                if(scroll_start > offset.top) {
                    $("#navigation").addClass("fancyNav");
                }
                else {
                    $("#navigation").removeClass("fancyNav");
                }
            });
        }
    });
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</div>
