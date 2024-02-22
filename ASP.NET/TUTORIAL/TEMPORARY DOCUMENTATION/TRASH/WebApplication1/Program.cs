using Microsoft.AspNetCore.Builder;
using Microsoft.AspNetCore.Routing;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.
builder.Services.AddRazorPages();
builder.Services.AddMvc(
    options => {
        options.EnableEndpointRouting = false;
        }
);
//builder.Services.AddTransient<TestServices>();
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

app.MapRazorPages();

app.UseMvc(
    routes => {
        routes.MapRoute(
            name: "",
            template: "",
            defaults: new { controller = "Index", action = "Index" }
            );

        routes.MapRoute(
            name: "account/register",
            template: "account/register/",
            defaults: new { controller = "Account", action = "Register" }
            );
    }
);

app.Run();
