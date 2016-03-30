package main

import "fmt"
import "net/http"

import "github.com/go-martini/martini"
import "github.com/martini-contrib/render"

type Beard struct {
  ID          string
  Name        string
  Type        string
  Awesomeness string
  Age         string
}

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
    ren.HTML(200, "new", nil)
  })

  // Create route
  m.Post("/", func (req *http.Request, ren render.Render)  {
    ren.Redirect("/")
    fmt.Println("data: " + req.FormValue("name"))
  })

  m.Run()
}
