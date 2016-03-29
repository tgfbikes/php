package main

import "fmt"
import "net/http"

import "github.com/go-martini/martini"
import "github.com/martini-contrib/render"

func main() {
  m := martini.Classic()
  m.Use(render.Renderer(render.Options{
    Layout: "layout",
  }))

  // Index route
  m.Get("/", func(ren render.Render) {
    ren.HTML(200, "index", "working")
  })

  // New route
  m.Get("/new", func(ren render.Render) {
    ren.HTML(200, "new", "working")
  })

  // Create route
  m.Post("/", func (req *http.Request, ren render.Render)  {
    ren.Redirect("/")
    fmt.Println("data: " + req.FormValue("name"))
  })

  m.Run()
}
