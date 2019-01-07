$(document).ready(function(){
    $("#newBlogForm").validate({
        rules: {
            blogTitle:{
                required: true
            },
            categoryId:{
                required: true
            },
            blogContent:{
                required: true
            },
            bannerFile:{
                required: true
            }
        },
        messages: {
            blogTitle: {
                required: "Title is required"
            },
            categoryId:{
                required: "Category is required"
            },
            blogContent:{
                required: "Content is required"
            },
            bannerFile:{
                required: "Banner is required"
            }
        },

        highlight: function (input) {
            $(input).parents('.form-control').addClass('error-large');
        },
        unhighlight: function (input) {
            $(input).parents('.form-control').removeClass('error-large');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
            $(element).parents('.input-group').append(error);
        }
    });


    $("#editBlogForm").validate({
        rules: {
            blogTitle:{
                required: true
            },
            categoryId:{
                required: true
            },
            blogContent:{
                required: true
            },
            bannerFile:{
                required: true
            }
        },
        messages: {
            blogTitle: {
                required: "Title is required"
            },
            categoryId:{
                required: "Category is required"
            },
            blogContent:{
                required: "Content is required"
            },
            bannerFile:{
                required: "Banner is required"
            }
        },

        highlight: function (input) {
            $(input).parents('.form-control').addClass('error-large');
        },
        unhighlight: function (input) {
            $(input).parents('.form-control').removeClass('error-large');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
            $(element).parents('.input-group').append(error);
        }
    });
});