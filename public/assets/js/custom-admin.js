


$(document).ready(function() {

    let table = new DataTable('#thetable');

    $('#title-input').keyup(function() {
        var title = $(this).val();
        var slug = title.toLowerCase()
                        .trim()
                        .replace(/[^\w\s-]/g, '') // Remove special characters
                        .replace(/[\s_-]+/g, '-') // Replace spaces and underscores with hyphens
                        .replace(/^-+|-+$/g, ''); // Remove leading/trailing hyphens
        
        $('#slug-output').val(slug);
    });
    $("textarea.description").summernote();
    // $('.dropdown-toggle').dropdown();

    $(document).on('click','.deletebtn',function(e) {
    
        e.preventDefault();

        var d_id = $(this).val();
        $('#post_id').val(d_id);

        $('#deleteModal').modal('show');

    });

    $( ".datepicker" ).datepicker();
});

