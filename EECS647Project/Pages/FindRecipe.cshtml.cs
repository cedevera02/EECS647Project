using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using System.Data;
using System.Text;
using System;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;

namespace EECS647Project.Pages
{
    public class FindRecipeModel : PageModel
    {
        private readonly ILogger<FindRecipeModel> _logger;

        public FindRecipeModel(ILogger<FindRecipeModel> logger)
        {
            _logger = logger;
        }

        public bool IsPostBack { get; private set; }

        public void OnGet()
        {
        }

        //protected void Page_Load(object sender, EventArgs e)
        //{
        //    if (!this.IsPostBack)
        //    {
        //        DataTable dt = new DataTable();
        //        dt.Columns.AddRange(new DataColumn[3] { new DataColumn("Id", typeof(int)),
        //            new DataColumn("Name", typeof(string)),
        //            new DataColumn("Country",typeof(string)) });
        //        dt.Rows.Add(1, "John Hammond", "United States");
        //        dt.Rows.Add(2, "Mudassar Khan", "India");
        //        dt.Rows.Add(3, "Suzanne Mathews", "France");
        //        dt.Rows.Add(4, "Robert Schidner", "Russia");

        //        StringBuilder sb = new StringBuilder();
        //        //Table start.
        //        sb.Append("<table cellpadding='5' cellspacing='0' style='border: 1px solid #ccc;font-size: 9pt;font-family:Arial'>");

        //        //Adding HeaderRow.
        //        sb.Append("<tr>");
        //        foreach (DataColumn column in dt.Columns)
        //        {
        //            sb.Append("<th style='background-color: #B8DBFD;border: 1px solid #ccc'>" + column.ColumnName + "</th>");
        //        }
        //        sb.Append("</tr>");


        //        //Adding DataRow.
        //        foreach (DataRow row in dt.Rows)
        //        {
        //            sb.Append("<tr>");
        //            foreach (DataColumn column in dt.Columns)
        //            {
        //                sb.Append("<td style='width:100px;border: 1px solid #ccc'>" + row[column.ColumnName].ToString() + "</td>");
        //            }
        //            sb.Append("</tr>");
        //        }

        //        //Table end.
        //        sb.Append("</table>");
        //        ltTable.Text = sb.ToString();
        //    }
        //}

        protected void Page_Load(object sender, EventArgs e)
        {
            String[,] cellValues = { { "1", "2", "3" }, { "a", "b", "c" }, { "m", "n", "o" } };

            HtmlTableRow row = new HtmlTableRow();
            HtmlTableCell cell = new HtmlTableCell();

            cell.ColSpan = 3;
            cell.InnerText = "Record 1";
            row.Cells.Add(cell);
            tableContent.Rows.Add(row);

            for (int i = 0; i < cellValues.GetLength(0); i++)
            {
                row = new HtmlTableRow();
                for (int j = 0; j < cellValues.GetLength(1); j++)
                {
                    cell = new HtmlTableCell();
                    cell.InnerText = cellValues[i, j];
                    row.Cells.Add(cell);
                }
                tableContent.Rows.Add(row);
            }

            row = new HtmlTableRow();
            cell = new HtmlTableCell();

            HtmlInputButton input = new HtmlInputButton();
            input.ID = "Button1";
            input.Value = "button";

            cell.ColSpan = 3;
            cell.Controls.Add(input);
            row.Cells.Add(cell);
            tableContent.Rows.Add(row);
        }
    }
}