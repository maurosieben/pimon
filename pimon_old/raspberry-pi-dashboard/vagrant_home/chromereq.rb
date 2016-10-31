require 'em-http'
require 'faye/websocket'
require 'json'
#the content of ARGV is the URL sent 
puts ARGV[0]

EM.run do
  # Chrome runs an HTTP handler listing available tabs
  conn = EM::HttpRequest.new('http://localhost:9222/json').get
  conn.callback do
    resp = JSON.parse(conn.response)
    puts "#{resp.size} available tabs, Chrome response: \n#{resp}"

    # connect to first tab via the WS debug URL
    ws = Faye::WebSocket::Client.new(resp.first['webSocketDebuggerUrl'])
    ws.onopen = lambda do |event|
     

      # tell Chrome to navigate to the page indicated in the URL
      ws.send JSON.dump({
        id: 2,
        method: 'Page.navigate',
        params: {url: ARGV[0]}
      })
    end

      ws.onmessage = lambda do |event|
	  
    end
  end
end
