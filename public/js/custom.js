$(document).ready(function() {
    // confirm delete
    $(document.body).on('submit', '.js-confirm', function() {
        var $el = $(this)
        var text = $el.data('confirm') ? $el.data('confirm') : 'Anda yakin melakukan tindakan ini?'
        var c = confirm(text);
        return c;
    });
    // delete review 
    $(document.body).on('submit', '.js-review-delete', function() {
        var $el = $(this);
        var text = $el.data('confirm') ? $el.data('confirm') : 'Anda yakin melakukan tindakan ini?';
        var c = confirm(text);
        // cancel delete
        if (c === false) return c;
        // delete via ajax
        // disable behaviour default dari tombol submit
        event.preventDefault();
        // hapus data dengan ajax
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            dataType: 'json',
            data: {
                _method: 'DELETE',
                // menambah csrf token dari Laravel
                _token: $(this).children('input[name=_token]').val()
            }
        }).done(function(data) {
            // cari baris yang dihapus
            baris = $('#form-' + data.id).closest('tr');
            // hilangkan baris (fadeout kemudian remove)
            baris.fadeOut(300, function() {
                $(this).remove()
            });
        });
    });
    $('#master').on('click', function(e) {
        if ($(this).is(':checked', true)) {
            $(".sub_chk").prop('checked', true);
        } else {
            $(".sub_chk").prop('checked', false);
        }
    });
    $('.delete_all').on('click', function(e) {
        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });
        if (allVals.length <= 0) {
            alert("Silahkan pilih baris.");
        } else {
            var check = confirm("Anda yakin akan menghapus semua baris yang sudah dipilih?");
            if (check == true) {
                var join_selected_values = allVals.join(",");
                $.ajax({
                    url: $(this).data('url'),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: 'ids=' + join_selected_values,
                    success: function(data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function(data) {
                        alert(data.responseText);
                    }
                });
                $.each(allVals, function(index, value) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                });
            }
        }
    });
});