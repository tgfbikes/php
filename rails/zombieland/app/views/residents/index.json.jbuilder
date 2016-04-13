json.array!(@residents) do |resident|
  json.extract! resident, :id, :name, :recruitment_tally, :date_of_undeath, :date, :on_diet, :picture
  json.url resident_url(resident, format: :json)
end
