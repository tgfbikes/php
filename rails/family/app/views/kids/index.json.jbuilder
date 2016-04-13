json.array!(@kids) do |kid|
  json.extract! kid, :id, :fname, :lname, :sex, :age
  json.url kid_url(kid, format: :json)
end
