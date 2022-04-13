var image = 
[
    {
        img: "Image/img0.jpg"
    },
    {
        img: "Image/img1.jpg"
    },
    {
        img: "Image/img2.jpg"
    },
    {
        img: "Image/img3.jpg"
    },
    {
        img: "Image/img4.jpg"
    },
    {
        img: "Image/img5.jpg"
    }
]
function Show()
{
    var bod = document.body;

    var main_image = document.createElement("div");
    main_image.setAttribute("class", "main_img");

    var img = document.createElement("img");
    img.setAttribute ("src", image[0].img);
    img.setAttribute ("class", "img0");
    main_image.appendChild(img);

    var images = document.createElement("div");
    images.setAttribute("class", "imgs");

    for(i = 1; i < image.length; i++) 
    {
        var gallery = document.createElement("div");
        gallery.setAttribute("class", "div_right");

        var img = document.createElement("img");
        img.setAttribute ("src", image[i].img);
        img.setAttribute ("class", "img");
        gallery.appendChild(img);
        gallery.className = "gallery";

        images.appendChild(gallery);
    }

    bod.appendChild(main_image);
    bod.appendChild(images);
}


