package main

import "github.com/go-martini/martini"
import "github.com/martini-contrib/render"

func main() {
  m := martini.Classic()
  m.Use(render.Renderer(render.Options{
    Layout: "layout",
  }))

  // Index route
  m.Get("/", func(r render.Render) {
    r.HTML(200, "index", "working")
  })

  // New route
  m.Get("/new", func(r render.Render) {
    r.HTML(200, "new", "working")
  })

  // Create route
  m.Post("/", func (r render.Render)  {
    r.Redirect("/")
  })

  m.Run()
}
