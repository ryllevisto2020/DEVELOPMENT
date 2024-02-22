using Microsoft.AspNetCore.Mvc;
using System.Reflection.Metadata;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.
builder.Services.AddRazorPages();
builder.Services.AddMvc(options => { options.EnableEndpointRouting = false; });

var app = builder.Build();

// Configure the HTTP request pipeline.
if (!app.Environment.IsDevelopment())
{
    app.UseExceptionHandler("/Error");
    // The default HSTS value is 30 days. You may want to change this for production scenarios, see https://aka.ms/aspnetcore-hsts.
    app.UseHsts();
}

app.UseHttpsRedirection();
app.UseStaticFiles();

app.UseRouting();

app.UseAuthorization();

app.UseMvc(routes=>
{
    routes.MapRoute(
        name: "test1",
        template:"test1", //www.localhost.com/<test1>
        defaults:new {controller= "Home", action= "Index" } //controller -> <Name of Controller>.cs , action -> public IActionResult <name of function>()
        );

    routes.MapRoute(
        name: "test2",
        template: "test2/{id}", //www.localhost.com/<test1>/1
        defaults: new { controller = "Home", action = "parameters" } //controller -> <Name of Controller>.cs , action -> public IActionResult <name of function>()
        );
    
    routes.MapRoute(
        name: "test3",
        template: "test3", //www.localhost.com/<test1>?id=1
        defaults: new { controller = "Home", action = "query_parameters" } //controller -> <Name of Controller>.cs , action -> public IActionResult <name of function>()
        );

    routes.MapRoute(
        name: "test4",
        template: "test4", //www.localhost.com/<test1> //Send POST Request 
        defaults: new { controller = "Home", action = "post_data" } //controller -> <Name of Controller>.cs , action -> public IActionResult <name of function>()
        );
});

app.MapRazorPages();

app.Run();
