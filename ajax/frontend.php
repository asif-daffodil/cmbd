<div id="data"></div>
<button id="Salam">Salam</button>
<button id="Hi">Hi</button>
<button id="Nomoshkar">Nomoshkar</button>
<br><br>
<form action="" id="sform" style="width: 300px">
    <input type="search" id="search" name="search" placeholder="Seach Here" autocomplete="off">
    <div id="searcResult"></div>
    <button type="submit">Search</button>
</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const kata = (ata = 'Hi') => {
        $.get({
            url: `backend.php?data=${ata}`,
            success: function(data) {
                $('#data').html(data);
            }
        });
    }
    kata();

    $('#Salam').click(function() {
        kata('Assalamu Alaikum');
    });

    $('#Hi').click(function() {
        kata('Hello');
    });

    $('#Nomoshkar').click(function() {
        kata('Nomoshkar');
    });

    $('#sform').submit(function(e) {
        e.preventDefault();
    });

    $('#search').css({
        'position': 'relative'
    });

    $('#searcResult').css({
        'position': 'absolute',
        'background': '#fff',
        'border': '1px solid #000',
        'width': '300px',
        'z-index': '999',
        'display': 'none'
    });

    $('#search').keyup(function() {
        if ($('#search').val()) {
            $('#searcResult').css('display', 'none');
        } else {
            $('#searcResult').css('display', 'block');
        }
        $.get({
            url: `backend.php?search=${$('#search').val()}`,
            success: function(data) {
                if (data === '') {
                    $('#searcResult').css('display', 'none');
                } else {
                    $('#searcResult').css('display', 'block');
                    $('#searcResult').html('');
                    data = JSON.parse(data);
                    data.forEach((item) => {
                        $('#searcResult').append(`<p>${item[1]}</p>`);
                    });
                }
            }
        });
    });

    $('#searcResult').on('click', 'p', function() {
        $('#search').val($(this).text());
        $('#searcResult').css('display', 'none');
    });

    // hover on p
    $('#searcResult').on('mouseover', 'p', function() {
        $(this).css('background', '#000');
        $(this).css('color', '#fff');
    });

    $('#searcResult').on('mouseout', 'p', function() {
        $(this).css('background', '#fff');
        $(this).css('color', '#000');
    });
</script>