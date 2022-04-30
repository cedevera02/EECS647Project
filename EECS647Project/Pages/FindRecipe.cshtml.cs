using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using System.Data;
using System.Text;
using System;
using System.Configuration;
using System.Data;
using System.Linq;

namespace EECS647Project.Pages
{
    public class FindRecipeModel : PageModel
    {
        private readonly ILogger<FindRecipeModel> _logger;
        DataTable _recipes = new DataTable();

        public FindRecipeModel(ILogger<FindRecipeModel> logger)
        {
            _logger = logger;
        }

        public bool IsPostBack { get; private set; }

        public void OnGet()
        {
        }
        public void PopulateTable()
        {
            _recipes.Columns.Add("RecipeName", typeof(string));
            _recipes.Columns.Add("Price", typeof(string));
            _recipes.Columns.Add("DietType", typeof(string));
            _recipes.Columns.Add("MealType", typeof(string));
            DataRow dr = _recipes.NewRow();
            dr["RecipeName"] = "Alfredo Chicken";
            dr["Price"] = "$";
            dr["DietType"] = "N/A";
            dr["MealType"] = "Dinner";
            _recipes.Rows.Add(dr);
            DataSet ds = new DataSet();
            ds.Tables.Add(_recipes);
            ViewData["Find Recipes"] = ds;
        }

    }
}