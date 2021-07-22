<%- include ('header') -%>

<%
if (locals.Page) {
    if(Page == 'Index'){
        %><%-include ('principal')-%><%}
    else if(Page == 'Vitrine'){
        %><%-include ('vitrine')-%><%}
    else if(Page == 'CV'){
        %><%-include ('cv')-%><%}
    else if(Page == 'CVBThibaut'){
            %><%-include ('CV/BThibaut')-%><%}
    else if(Page == 'CVBJulian'){
                %><%-include ('CV/BJulian')-%><%}
}
else {
    %><%
}


 %><%-include ('footer') -%>