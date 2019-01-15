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

    $("#newCategoryForm").validate({
        rules: {
            categoryName:{
                required: true
            },
            categoryDesc:{
                required: true
            }
        },
        messages: {
            categoryName:{
                required: "Name is required"
            },
            categoryDesc:{
                required: "Description is required"
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

    $("#editCategoryForm").validate({
        rules: {
            categoryName:{
                required: true
            },
            categoryDesc:{
                required: true
            }
        },
        messages: {
            categoryName:{
                required: "Name is required"
            },
            categoryDesc:{
                required: "Description is required"
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

    $("#newAuthorForm").validate({
        rules: {
            authorName:{
                required: true
            },
            authorEmail:{
                required: true
            },
            authorPassword:{
                required: true
            },
            authorRole:{
                required: true
            }
        },
        messages: {
            authorName:{
                required: "Name is required"
            },
            authorEmail:{
                required: "Email is required"
            },
            authorPassword:{
                required: "Password is required"
            },
            authorRole:{
                required: "Role is required"
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