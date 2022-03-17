function ChangeTema()
{
    if(document.body.classList.contains("White"))
    {
        document.body.classList.remove("White");
        document.body.classList.add("Black");
    }
    else 
    {
        document.body.classList.remove("Black");
        document.body.classList.add("White");
    }
}