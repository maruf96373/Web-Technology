def dfs(graph, start, end, visited, path, shortest_path, shortest_length):
    visited.add(start)
    path.append(start)

    if start == end:
        if len(path) < shortest_length[0]:
            shortest_length[0] = len(path)
            shortest_path.clear()
            shortest_path.extend(path)
    else:
        for neighbor in graph[start]:
            if neighbor not in visited:
                dfs(graph, neighbor, end, visited, path, shortest_path, shortest_length)

    visited.remove(start)
    path.pop()
    return shortest_path, shortest_length

visited = set()

def traverse(visited, graph, node):
    if node not in visited:
        print(node)
        visited.add(node)
    for neighbour in graph[node]:
        traverse(visited, graph, neighbour)

graph = {
    '3': ['4', '5'],
    '4': ['6', '7'],
    '6': [],
    '5': ['8'],
    '7': ['8'],
    '8': []
}

start = '3'
end = '8'

shortest_path = []
shortest_length = [float('inf')]

shortest_path, shortest_length = dfs(graph, start, end, set(), [], shortest_path, shortest_length)

traverse(visited, graph, start)

print("Shortest path:", shortest_path)
print("Shortest path length:", shortest_length[0])
