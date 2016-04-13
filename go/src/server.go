package main

import "fmt"
import "net/http"
import "io/ioutil"
import "encoding/json"
import "net/url"

import "github.com/go-martini/martini"
import "github.com/martini-contrib/render"

type Beard struct {
  ID          string
  Name        string
  Type        string
  Awesomeness string
  Age         string
}

const ApiBase = "http://sking.php.cs.dixie.edu/slimapi/index.php"

func panicIf(err error) {
  if err != nil {
    panic(err)
  }
}

func makeGetRequest(path string) []byte {
  res, err := http.Get(ApiBase + path)
  panicIf(err)

  body, err := ioutil.ReadAll(res.Body)
  panicIf(err)

  return body
}

func makePostRequest(path string, data url.Values) []byte {
  res, err := http.PostForm(ApiBase + path, data)
  panicIf(err)
  body, err := ioutil.ReadAll(res.Body)
  panicIf(err)
  return body
}

func createBeard(beard Beard) Beard {
  data := url.Values{}
  data.Add("name", beard.Name)
  data.Add("beard_type", beard.Type)
  data.Add("awesomeness", beard.Awesomeness)
  data.Add("age", beard.Age)

  beardByteArray := makePostRequest("/beards.json", data)
  createdBeard   := Beard{}
  err            := json.Unmarshal(beardByteArray, &createdBeard)
  panicIf(err)
  return createdBeard
}

func getBeards() []Beard {
  data := makeGetRequest("/beards.json")
  beards := []Beard{}
  err := json.Unmarshal(data, &beards)
  panicIf(err)
  return beards
}

func getBeard(id string) Beard {
  path  := fmt.Sprintf("/beards/%s.json", id)
  data  := makeGetRequest(path)
  beard := Beard{}
  err   := json.Unmarshal(data, &beard)
  panicIf(err)
  return beard
}

func main() {
  m := martini.Classic()
  m.Use(render.Renderer(render.Options{
    Layout: "layout",
  }))

  // Index route
  m.Get("/", func(ren render.Render) {
    beards := getBeards()
    ren.HTML(200, "index", beards)
  })

  // New route
  m.Get("/new", func(ren render.Render) {
    ren.HTML(200, "new", nil)
  })

  // Show route
  m.Get("/(?P<id>[0-9]+)", func(ren render.Render, params martini.Params) {
    id := params["id"]
    beard := getBeard(id)
    ren.HTML(200, "show", beard)
  })

  // Create route
  m.Post("/", func (req *http.Request, ren render.Render)  {
    beard := Beard{
      Name:        req.FormValue("name"),
      Type:        req.FormValue("beard_type"),
      Awesomeness: req.FormValue("awesomeness"),
      Age:         req.FormValue("age"),
    }
    beard = createBeard(beard)
    ren.HTML(200, "create", beard)
  })

  m.Run()
}
